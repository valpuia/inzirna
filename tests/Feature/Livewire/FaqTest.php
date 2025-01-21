<?php

use App\Livewire\Faq;
use Database\Factories\FaqFactory;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Faq::class)
        ->assertStatus(200);
});

it('render announcements', function (): void {
    FaqFactory::new()->count(20)->create();

    Livewire::test(Faq::class)
        ->assertViewHas('faqs', function ($faqs) {
            return count($faqs) == 20;
        });
});
