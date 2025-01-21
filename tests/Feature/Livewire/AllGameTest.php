<?php

use App\Enums\GameTypeEnum;
use App\Livewire\Arcade;
use App\Livewire\Fishing;
use App\Livewire\Live;
use App\Livewire\Slot;
use App\Livewire\Sport;
use App\Livewire\Table;
use Database\Factories\GameFactory;
use Livewire\Livewire;

describe('game components', function (): void {
    test('renders slots components', function (): void {
        Livewire::test(Slot::class)
            ->assertStatus(200);
    });

    test('renders live components', function (): void {
        Livewire::test(Live::class)
            ->assertStatus(200);
    });

    test('renders fishing components', function (): void {
        Livewire::test(Fishing::class)
            ->assertStatus(200);
    });

    test('renders sport components', function (): void {
        Livewire::test(Sport::class)
            ->assertStatus(200);
    });

    test('renders table components', function (): void {
        Livewire::test(Table::class)
            ->assertStatus(200);
    });

    test('renders arcade components', function (): void {
        Livewire::test(Arcade::class)
            ->assertStatus(200);
    });
});

describe('pagination', function (): void {
    test('render slots', function (): void {
        GameFactory::new()->count(20)->create([
            'type' => GameTypeEnum::Slots->value,
        ]);

        Livewire::test(Slot::class)
            ->assertViewHas('games', function ($games) {
                return count($games) == 12;
            });
    });

    test('render live', function (): void {
        GameFactory::new()->count(20)->create([
            'type' => GameTypeEnum::Live->value,
        ]);

        Livewire::test(Live::class)
            ->assertViewHas('games', function ($lives) {
                return count($lives) == 12;
            });
    });

    test('render fishing', function (): void {
        GameFactory::new()->count(20)->create([
            'type' => GameTypeEnum::Fishing->value,
        ]);

        Livewire::test(Fishing::class)
            ->assertViewHas('games', function ($fishings) {
                return count($fishings) == 12;
            });
    });

    test('render sport', function (): void {
        GameFactory::new()->count(20)->create([
            'type' => GameTypeEnum::Sports->value,
        ]);

        Livewire::test(Sport::class)
            ->assertViewHas('games', function ($sports) {
                return count($sports) == 12;
            });
    });

    test('render table', function (): void {
        GameFactory::new()->count(20)->create([
            'type' => GameTypeEnum::Table->value,
        ]);

        Livewire::test(Table::class)
            ->assertViewHas('games', function ($tables) {
                return count($tables) == 12;
            });
    });

    test('render arcade', function (): void {
        GameFactory::new()->count(20)->create([
            'type' => GameTypeEnum::Arcade->value,
        ]);

        Livewire::test(Arcade::class)
            ->assertViewHas('games', function ($arcades) {
                return count($arcades) == 12;
            });
    });
});
