<?php

use App\Livewire\Announcement;
use Database\Factories\AnnouncementFactory;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Announcement::class)
        ->assertStatus(200);
});

it('render announcements', function (): void {
    AnnouncementFactory::new()->count(20)->create();

    Livewire::test(Announcement::class)
        ->assertViewHas('announcements', function ($announcements) {
            return count($announcements) == 8;
        });
});
