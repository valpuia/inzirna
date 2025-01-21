<?php

use App\Livewire\Blog;
use Database\Factories\BlogFactory;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Blog::class)
        ->assertStatus(200);
});

it('render blogs', function (): void {
    BlogFactory::new()->count(20)->create();

    Livewire::test(Blog::class)
        ->assertViewHas('blogs', function ($blogs) {
            return count($blogs) == 9;
        });
});
