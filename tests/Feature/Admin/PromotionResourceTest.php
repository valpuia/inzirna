<?php

use App\Filament\Resources\PromotionResource;
use App\Models\Promotion;
use Database\Factories\PromotionFactory;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\FileUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Livewire\livewire;

it('can render page', function () {
    $this->get(PromotionResource::getUrl())
        ->assertSuccessful();
});

it('can list promotions', function () {
    $promotions = PromotionFactory::new()->count(10)->create();

    Livewire(PromotionResource\Pages\ListPromotions::class)
        ->assertCanSeeTableRecords($promotions);
});

it('can render table columns', function (string $column) {
    PromotionFactory::new()->count(10)->create();

    livewire(PromotionResource\Pages\ListPromotions::class)
        ->assertCanRenderTableColumn($column);
})->with(['image', 'title', 'created_at']);

it('can search promotions by title', function () {
    $promotions = PromotionFactory::new()->count(10)->create();

    $title = $promotions->first()->title;

    livewire(PromotionResource\Pages\ListPromotions::class)
        ->searchTable($title)
        ->assertCanSeeTableRecords($promotions->where('title', $title))
        ->assertCanNotSeeTableRecords($promotions->where('title', '!=', $title));
});

it('can render create page', function () {
    $this->get(PromotionResource::getUrl('create'))
        ->assertSuccessful();
});

it('has a form', function () {
    livewire(PromotionResource\Pages\CreatePromotion::class)
        ->assertFormExists();
});

it('has form fields', function (string $field) {
    livewire(PromotionResource\Pages\CreatePromotion::class)
        ->assertFormFieldExists($field);
})->with([
    'title',
    'url',
    'image',
    'alt',
    'description',
]);

it('can validate input', function () {
    livewire(PromotionResource\Pages\CreatePromotion::class)
        ->fillForm([
            'title' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['title' => 'required']);
});

it('can create new data', function () {
    FileUpload::configureUsing(function (FileUpload $component) {
        $component->preserveFilenames();
    });

    $newData = PromotionFactory::new()->make();

    $formFilename = Str::random().'.jpg';
    $formImage = UploadedFile::fake()->image($formFilename);

    livewire(PromotionResource\Pages\CreatePromotion::class)
        ->fillForm([
            'title' => $newData->title,
            'url' => $newData->url,
            'image.0' => $formImage,
            'alt' => $newData->alt,
            'description' => $newData->description,
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertRedirect(PromotionResource::getUrl());

    Storage::disk('public')->assertExists("promotions/{$formFilename}");

    $this->assertDatabaseHas(Promotion::class, [
        'title' => $newData->title,
        'url' => $newData->url,
        'alt' => $newData->alt,
        'image' => "promotions/{$formFilename}",
        'description' => $newData->description,
    ]);
});

it('can render edit page', function () {
    $this->get(PromotionResource::getUrl('edit', [
        'record' => PromotionFactory::new()->create(),
    ]))->assertSuccessful();
});

it('can retrieve data', function () {
    $promotion = PromotionFactory::new()->create();

    livewire(PromotionResource\Pages\EditPromotion::class, [
        'record' => $promotion->getRouteKey(),
    ])
        ->assertFormSet([
            'title' => $promotion->title,
            'url' => $promotion->url,
            'description' => $promotion->description,
            'image.0' => null,
            'alt' => $promotion->alt,
        ]);
});

it('can validate input on edit', function () {
    $promotion = PromotionFactory::new()->create();

    livewire(PromotionResource\Pages\EditPromotion::class, [
        'record' => $promotion->getRouteKey(),
    ])
        ->fillForm([
            'title' => null,
        ])
        ->call('save')
        ->assertHasFormErrors(['title' => 'required']);
});

it('can save', function () {
    FileUpload::configureUsing(function (FileUpload $component) {
        $component->preserveFilenames();
    });

    $formFilename = Str::random().'.jpg';
    $formImage = UploadedFile::fake()->image($formFilename);

    $promotion = PromotionFactory::new()->create();
    $newData = PromotionFactory::new()->make([
        'image' => $formImage,
    ]);

    livewire(PromotionResource\Pages\EditPromotion::class, [
        'record' => $promotion->getRouteKey(),
    ])
        ->fillForm([
            'title' => $newData->title,
            'url' => $newData->url,
            'description' => $newData->description,
            'image.0' => $formImage,
            'alt' => $newData->alt,
        ])
        ->call('save')
        ->assertHasNoFormErrors()
        ->assertRedirect(PromotionResource::getUrl());

    expect($promotion->refresh())
        ->title->toBe($newData->title)
        ->url->toBe($newData->url)
        ->description->toBe($newData->description)
        ->image->toBe("promotions/{$formFilename}")
        ->alt->toBe($newData->alt);
});

it('can delete', function () {
    $promotion = PromotionFactory::new()->create();

    livewire(PromotionResource\Pages\EditPromotion::class, [
        'record' => $promotion->getRouteKey(),
    ])
        ->callAction(DeleteAction::class);

    $this->assertModelMissing($promotion);
});
