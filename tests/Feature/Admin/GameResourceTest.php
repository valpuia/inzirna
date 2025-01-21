<?php

use App\Enums\GameTypeEnum;
use App\Filament\Resources\GameResource;
use App\Models\Game;
use Database\Factories\GameFactory;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\FileUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Livewire\livewire;

it('can render page', function () {
    $this->get(GameResource::getUrl())
        ->assertSuccessful();
});

it('can list games', function () {
    $games = GameFactory::new()->count(10)->create();

    Livewire(GameResource\Pages\ListGames::class)
        ->assertCanSeeTableRecords($games);
});

it('can render table columns', function (string $column) {
    GameFactory::new()->count(10)->create();

    livewire(GameResource\Pages\ListGames::class)
        ->assertCanRenderTableColumn($column);
})->with(['image', 'title', 'type', 'created_at']);

it('can search games by title', function () {
    $games = GameFactory::new()->count(10)->create();

    $title = $games->first()->title;

    livewire(GameResource\Pages\ListGames::class)
        ->searchTable($title)
        ->assertCanSeeTableRecords($games->where('title', $title))
        ->assertCanNotSeeTableRecords($games->where('title', '!=', $title));
});

it('can render create page', function () {
    $this->get(GameResource::getUrl('create'))
        ->assertSuccessful();
});

it('has a form', function () {
    livewire(GameResource\Pages\CreateGame::class)
        ->assertFormExists();
});

it('has form fields', function (string $field) {
    livewire(GameResource\Pages\CreateGame::class)
        ->assertFormFieldExists($field);
})->with([
    'title',
    'slug',
    'content',
    'type',
    'image',
    'alt',
    'seo_image',
    'seo_title',
    'seo_description',
    'seo_keywords',
    'seo_author',
]);

it('can validate input', function () {
    livewire(GameResource\Pages\CreateGame::class)
        ->fillForm([
            'title' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['title' => 'required']);
});

it('can automatically generate a slug from the title', function () {
    $title = fake()->sentence();

    livewire(GameResource\Pages\CreateGame::class)
        ->fillForm([
            'title' => $title,
        ])
        ->assertFormSet([
            'slug' => Str::slug($title),
        ]);
});

it('can create new data', function () {
    FileUpload::configureUsing(function (FileUpload $component) {
        $component->preserveFilenames();
    });

    $newData = GameFactory::new()->make();

    $formFilename = Str::random().'.jpg';
    $formImage = UploadedFile::fake()->image($formFilename);

    $seoFilename = Str::random().'.png';
    $seoImage = UploadedFile::fake()->image($seoFilename);

    livewire(GameResource\Pages\CreateGame::class)
        ->fillForm([
            'title' => $newData->title,
            'slug' => $newData->slug,
            'type' => $newData->type,
            'content' => $newData->content,
            'image.0' => $formImage,
            'alt' => $newData->alt,
            'seo_title' => $newData->seo_title,
            'seo_description' => $newData->seo_description,
            'seo_keywords' => [$newData->seo_keywords],
            'seo_author' => $newData->seo_author,
            'seo_image.0' => $seoImage,
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertRedirect(GameResource::getUrl());

    Storage::disk('public')->assertExists("games/{$formFilename}");
    Storage::disk('public')->assertExists("game-seo/{$seoFilename}");

    $this->assertDatabaseHas(Game::class, [
        'title' => $newData->title,
        'slug' => $newData->slug,
        'type' => $newData->type,
        'content' => $newData->content,
        'image' => "games/{$formFilename}",
        'alt' => $newData->alt,
        'seo_title' => $newData->seo_title,
        'seo_description' => $newData->seo_description,
        'seo_keywords' => $newData->seo_keywords,
        'seo_author' => $newData->seo_author,
        'seo_image' => "game-seo/{$seoFilename}",
    ]);
});

it('can render edit page', function () {
    $this->get(GameResource::getUrl('edit', [
        'record' => GameFactory::new()->create(),
    ]))->assertSuccessful();
});

it('can retrieve data', function () {
    $game = GameFactory::new()->create([
        'type' => GameTypeEnum::Arcade,
    ]);

    livewire(GameResource\Pages\EditGame::class, [
        'record' => $game->getRouteKey(),
    ])
        ->assertFormSet([
            'title' => $game->title,
            'slug' => $game->slug,
            'type' => GameTypeEnum::Arcade->value,
            'content' => $game->content,
            'image.0' => null,
            'alt' => $game->alt,
            'seo_title' => $game->seo_title,
            'seo_description' => $game->seo_description,
            'seo_keywords' => [$game->seo_keywords],
            'seo_author' => $game->seo_author,
            'seo_image.0' => null,
        ]);
});

it('can validate input on edit', function () {
    $game = GameFactory::new()->create();

    livewire(GameResource\Pages\EditGame::class, [
        'record' => $game->getRouteKey(),
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

    $seoFilename = Str::random().'.png';
    $seoImage = UploadedFile::fake()->image($seoFilename);

    $game = GameFactory::new()->create();
    $newData = GameFactory::new()->make([
        'image' => $formImage,
        'seo_image' => $seoImage,
    ]);

    livewire(GameResource\Pages\EditGame::class, [
        'record' => $game->getRouteKey(),
    ])
        ->fillForm([
            'title' => $newData->title,
            'slug' => $newData->slug,
            'type' => $newData->type,
            'content' => $newData->content,
            'image.0' => $formImage,
            'alt' => $newData->alt,
            'seo_title' => $newData->seo_title,
            'seo_description' => $newData->seo_description,
            'seo_keywords' => [$newData->seo_keywords],
            'seo_author' => $newData->seo_author,
            'seo_image.0' => $seoImage,
        ])
        ->call('save')
        ->assertHasNoFormErrors()
        ->assertRedirect(GameResource::getUrl());

    expect($game->refresh())
        ->title->toBe($newData->title)
        ->slug->toBe($newData->slug)
        ->type->toBe($newData->type)
        ->content->toBe($newData->content)
        ->image->toBe("games/{$formFilename}")
        ->alt->toBe($newData->alt)
        ->seo_title->toBe($newData->seo_title)
        ->seo_description->toBe($newData->seo_description)
        ->seo_keywords->toBe($newData->seo_keywords)
        ->seo_author->toBe($newData->seo_author)
        ->seo_image->toBe("game-seo/{$seoFilename}");
});

it('can delete', function () {
    $game = GameFactory::new()->create();

    livewire(GameResource\Pages\EditGame::class, [
        'record' => $game->getRouteKey(),
    ])
        ->callAction(DeleteAction::class);

    $this->assertModelMissing($game);
});
