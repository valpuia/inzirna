<?php

use App\Filament\Resources\CarouselResource;
use App\Models\Carousel;
use Database\Factories\CarouselFactory;
use Filament\Forms\Components\FileUpload;
use Illuminate\Http\UploadedFile;

use function Pest\Livewire\livewire;

it('can render page', function () {
    $this->get(CarouselResource::getUrl())
        ->assertSuccessful();
});

it('can list carousels', function () {
    $carousels = CarouselFactory::new()->count(10)->create();

    Livewire(CarouselResource\Pages\ManageCarousels::class)
        ->assertCanSeeTableRecords($carousels);
});

it('can render table columns', function (string $column) {
    CarouselFactory::new()->count(10)->create();

    livewire(CarouselResource\Pages\ManageCarousels::class)
        ->assertCanRenderTableColumn($column);
})->with(['image', 'links', 'created_at']);

it('can render create modal', function () {
    livewire(CarouselResource\Pages\ManageCarousels::class)
        ->callAction('create')
        ->assertSuccessful();
});

it('has form fields', function (string $field) {
    livewire(CarouselResource\Pages\ManageCarousels::class)
        ->mountAction('create')
        ->assertSee($field);
})->with(['image', 'alt', 'links']);

it('can validate input', function () {
    livewire(CarouselResource\Pages\ManageCarousels::class)
        ->mountAction('create')
        ->setActionData([
            'image' => null,
        ])
        ->callMountedAction()
        ->assertHasActionErrors(['image' => 'required']);
});

it('can create new data', function () {
    FileUpload::configureUsing(function (FileUpload $component) {
        $component->preserveFilenames();
    });

    $formFilename = Str::random().'.jpg';
    $formImage = UploadedFile::fake()->image($formFilename);

    $newData = CarouselFactory::new()->create([
        'image' => $formImage,
    ]);

    livewire(CarouselResource\Pages\ManageCarousels::class)
        ->mountAction('create')
        ->setActionData([
            'image' => $newData->image,
            'alt' => $newData->alt,
            'links' => $newData->links,
        ])
        ->callMountedAction();

    $this->assertDatabaseHas(Carousel::class, [
        'image' => "carousels/{$formFilename}",
        'alt' => $newData->alt,
        'links' => $newData->links,
    ]);
});

it('can render edit modal', function () {
    $faq = CarouselFactory::new()->create();

    livewire(CarouselResource\Pages\ManageCarousels::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('edit')
        ->assertSuccessful();
});

it('can retrieve data', function () {
    $faq = CarouselFactory::new()->create();

    livewire(CarouselResource\Pages\ManageCarousels::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('edit')
        ->assertSee('image', $faq->image)
        ->assertSee('links', $faq->links);
});

it('can validate input on edit', function () {
    $faq = CarouselFactory::new()->create();

    livewire(CarouselResource\Pages\ManageCarousels::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('edit')
        ->callTableAction('edit', $faq->getRouteKey(), [
            'image' => null,
        ])
        ->assertHasErrors();
});

it('can save', function () {
    FileUpload::configureUsing(function (FileUpload $component) {
        $component->preserveFilenames();
    });

    $formFilename = Str::random().'.jpg';
    $formImage = UploadedFile::fake()->image($formFilename);

    $faq = CarouselFactory::new()->create([
        'image' => $formImage,
    ]);
    $newData = CarouselFactory::new()->make([
        'image' => $formImage,
    ]);

    livewire(CarouselResource\Pages\ManageCarousels::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('edit')
        ->callTableAction('edit', $faq->getRouteKey(), [
            'image.0' => $newData->image,
            'alt' => $newData->alt,
            'links' => $newData->links,
        ])
        ->assertHasNoActionErrors();

    expect($faq->refresh())
        ->image->toBe("carousels/{$formFilename}")
        ->alt->toBe($newData->alt)
        ->links->toBe($newData->links);
});

it('can delete', function () {
    $faq = CarouselFactory::new()->create();

    livewire(CarouselResource\Pages\ManageCarousels::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('delete')
        ->callTableAction('delete', $faq->getRouteKey());

    $this->assertModelMissing($faq);
});
