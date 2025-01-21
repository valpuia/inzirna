<?php

use App\Livewire\Promotion;
use Database\Factories\PromotionFactory;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Promotion::class)
        ->assertStatus(200);
});

it('render promotions', function (): void {
    PromotionFactory::new()->count(20)->create();

    Livewire::test(Promotion::class)
        ->assertViewHas('promotions', function ($promotions) {
            return count($promotions) == 6;
        });
});
