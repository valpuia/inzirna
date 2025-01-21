<?php

use App\Filament\Resources\PageResource;
use Database\Factories\PageFactory;

use function Pest\Livewire\livewire;

it('can render page', function () {
    $this->get(PageResource::getUrl())
        ->assertSuccessful();
});

it('can list pages', function () {
    $pages = PageFactory::new()->count(2)->create();

    Livewire(PageResource\Pages\ListPages::class)
        ->assertCanSeeTableRecords($pages);
});

it('can render table columns', function (string $column) {
    PageFactory::new()->count(2)->create();

    livewire(PageResource\Pages\ListPages::class)
        ->assertCanRenderTableColumn($column);
})->with(['title', 'path', 'created_at']);

it('has a form', function () {
    $page = PageFactory::new()->create();

    livewire(PageResource\Pages\EditPage::class, [
        'record' => $page->getRouteKey(),
    ])
        ->assertFormExists();
});

it('has form fields', function (string $field) {
    $page = PageFactory::new()->create();

    livewire(PageResource\Pages\EditPage::class, [
        'record' => $page->getRouteKey(),
    ])
        ->assertFormFieldExists($field);
})->with(['title', 'path', 'content']);

it('can render edit page', function () {
    $this->get(PageResource::getUrl('edit', [
        'record' => PageFactory::new()->create(),
    ]))->assertSuccessful();
});

it('can retrieve data', function () {
    $page = PageFactory::new()->create();

    livewire(PageResource\Pages\EditPage::class, [
        'record' => $page->getRouteKey(),
    ])
        ->assertFormSet([
            'title' => $page->title,
            'path' => $page->path,
            'content' => $page->content,
        ]);
});

it('can validate input on edit', function () {
    $page = PageFactory::new()->create();

    livewire(PageResource\Pages\EditPage::class, [
        'record' => $page->getRouteKey(),
    ])
        ->fillForm([
            'title' => null,
        ])
        ->call('save')
        ->assertHasFormErrors(['title' => 'required']);
});

it('can save', function () {
    $page = PageFactory::new()->create();
    $newData = PageFactory::new()->make();

    livewire(PageResource\Pages\EditPage::class, [
        'record' => $page->getRouteKey(),
    ])
        ->fillForm([
            'title' => $newData->title,
            'path' => $page->path,
            'content' => $newData->content,
        ])
        ->call('save')
        ->assertHasNoFormErrors()
        ->assertRedirect(PageResource::getUrl());

    expect($page->refresh())
        ->title->toBe($newData->title)
        ->path->toBe($page->path)
        ->content->toBe($newData->content);
});
