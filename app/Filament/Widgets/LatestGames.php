<?php

namespace App\Filament\Widgets;

use App\Models\Game;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestGames extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(Game::query()->latest()->take(5))
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->size(40),

                Tables\Columns\TextColumn::make('title')
                    ->limit(30),

                Tables\Columns\TextColumn::make('type'),
            ])
            ->paginated(false)
            ->recordUrl(fn ($record) => route('filament.admin.resources.games.edit', $record));
    }
}
