<?php

namespace App\Filament\Widgets;

use App\Enums\GameTypeEnum;
use App\Models\Game;
use Filament\Widgets\ChartWidget;

class GamesChart extends ChartWidget
{
    protected static ?string $heading = 'Games';

    protected static ?string $description = 'Total number of games per type';

    protected static ?string $pollingInterval = null;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Total',
                    'data' => [
                        $this->countTotal(GameTypeEnum::Slots),
                        $this->countTotal(GameTypeEnum::Live),
                        $this->countTotal(GameTypeEnum::Fishing),
                        $this->countTotal(GameTypeEnum::Sports),
                        $this->countTotal(GameTypeEnum::Table),
                        $this->countTotal(GameTypeEnum::Arcade),
                    ],
                ],
            ],
            'labels' => GameTypeEnum::cases(),
        ];
    }

    private function countTotal($type)
    {
        return Game::where('type', $type)->count();
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
