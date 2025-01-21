<?php

namespace App\Filament\Resources\GameResource\Pages;

use App\Enums\GameTypeEnum;
use App\Filament\Resources\GameResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListGames extends ListRecords
{
    protected static string $resource = GameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()->icon('heroicon-o-rectangle-group'),

            GameTypeEnum::Slots->value => Tab::make()
                ->icon(GameTypeEnum::Slots->getIcon())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', GameTypeEnum::Slots)),

            GameTypeEnum::Live->value => Tab::make()
                ->icon(GameTypeEnum::Live->getIcon())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', GameTypeEnum::Live)),

            GameTypeEnum::Fishing->value => Tab::make()
                ->icon(GameTypeEnum::Fishing->getIcon())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', GameTypeEnum::Fishing)),

            GameTypeEnum::Sports->value => Tab::make()
                ->icon(GameTypeEnum::Sports->getIcon())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', GameTypeEnum::Sports)),

            GameTypeEnum::Table->value => Tab::make()
                ->icon(GameTypeEnum::Table->getIcon())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', GameTypeEnum::Table)),

            GameTypeEnum::Arcade->value => Tab::make()
                ->icon(GameTypeEnum::Arcade->getIcon())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', GameTypeEnum::Arcade)),
        ];
    }
}
