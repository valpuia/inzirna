<?php

use App\Filament\Resources\AnnouncementResource;
use App\Models\Announcement;
use Database\Factories\AnnouncementFactory;

use function Pest\Livewire\livewire;

it('can render page', function () {
    $this->get(AnnouncementResource::getUrl())
        ->assertSuccessful();
});

it('can list announcements', function () {
    $announcements = AnnouncementFactory::new()->count(10)->create();

    Livewire(AnnouncementResource\Pages\ManageAnnouncements::class)
        ->assertCanSeeTableRecords($announcements);
});

it('can render table columns', function (string $column) {
    AnnouncementFactory::new()->count(10)->create();

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class)
        ->assertCanRenderTableColumn($column);
})->with(['title', 'detail', 'created_at']);

it('can search announcements by title', function () {
    $announcements = AnnouncementFactory::new()->count(10)->create();

    $title = $announcements->first()->title;

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class)
        ->searchTable($title)
        ->assertCanSeeTableRecords($announcements->where('title', $title))
        ->assertCanNotSeeTableRecords($announcements->where('title', '!=', $title));
});

it('can search announcements by detail', function () {
    $announcements = AnnouncementFactory::new()->count(10)->create();

    $detail = $announcements->first()->detail;

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class)
        ->searchTable($detail)
        ->assertCanSeeTableRecords($announcements->where('detail', $detail))
        ->assertCanNotSeeTableRecords($announcements->where('detail', '!=', $detail));
});

it('can render create modal', function () {
    livewire(AnnouncementResource\Pages\ManageAnnouncements::class)
        ->callAction('create')
        ->assertSuccessful();
});

it('has form fields', function (string $field) {
    livewire(AnnouncementResource\Pages\ManageAnnouncements::class)
        ->mountAction('create')
        ->assertSee($field);
})->with(['title', 'detail']);

it('can validate input', function () {
    livewire(AnnouncementResource\Pages\ManageAnnouncements::class)
        ->mountAction('create')
        ->setActionData([
            'title' => null,
        ])
        ->callMountedAction()
        ->assertHasActionErrors(['title' => 'required']);
});

it('can create new data', function () {
    $newData = AnnouncementFactory::new()->create();

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class)
        ->mountAction('create')
        ->setActionData([
            'title' => $newData->title,
            'detail' => $newData->detail,
        ])
        ->callMountedAction();

    $this->assertDatabaseHas(Announcement::class, [
        'title' => $newData->title,
        'detail' => $newData->detail,
    ]);
});

it('can render edit modal', function () {
    $announcement = AnnouncementFactory::new()->create();

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class, [
        'record' => $announcement->getRouteKey(),
    ])
        ->mountAction('edit')
        ->assertSuccessful();
});

it('can retrieve data', function () {
    $announcement = AnnouncementFactory::new()->create();

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class, [
        'record' => $announcement->getRouteKey(),
    ])
        ->mountAction('edit')
        ->assertSee('title', $announcement->title)
        ->assertSee('detail', $announcement->detail);
});

it('can validate input on edit', function () {
    $announcement = AnnouncementFactory::new()->create();

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class, [
        'record' => $announcement->getRouteKey(),
    ])
        ->mountAction('edit')
        ->callTableAction('edit', $announcement->getRouteKey(), [
            'title' => null,
        ])
        ->assertHasErrors();
});

it('can save', function () {
    $announcement = AnnouncementFactory::new()->create();
    $newData = AnnouncementFactory::new()->make();

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class, [
        'record' => $announcement->getRouteKey(),
    ])
        ->mountAction('edit')
        ->callTableAction('edit', $announcement->getRouteKey(), [
            'title' => $newData->title,
            'detail' => $newData->detail,
        ])
        ->assertHasNoActionErrors();

    expect($announcement->refresh())
        ->title->toBe($newData->title)
        ->detail->toBe($newData->detail);
});

it('can delete', function () {
    $announcement = AnnouncementFactory::new()->create();

    livewire(AnnouncementResource\Pages\ManageAnnouncements::class, [
        'record' => $announcement->getRouteKey(),
    ])
        ->mountAction('delete')
        ->callTableAction('delete', $announcement->getRouteKey());

    $this->assertModelMissing($announcement);
});
