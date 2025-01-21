<?php

use App\Livewire\Home;
use Database\Factories\BlogFactory;
use Database\Factories\CarouselFactory;
use Livewire\Livewire;

it('renders the home component', function (): void {
    Livewire::test(Home::class)
        ->assertViewIs('livewire.home')
        ->assertStatus(200);
});

it('sets carousel images and latest blogs', function (): void {
    CarouselFactory::new()->count(3)->create();
    BlogFactory::new()->count(8)->create();

    Livewire::test(Home::class)
        ->assertCount('carouselImages', 3)
        ->assertCount('blogs', 8);
});

it('display all static links', function (): void {
    Livewire::test(Home::class)
        ->assertSeeInOrder(['Slots', 'arcade', 'fishing', 'live', 'sport', 'table']);
});
