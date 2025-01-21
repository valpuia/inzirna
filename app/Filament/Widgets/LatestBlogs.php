<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestBlogs extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(Blog::query()->latest()->take(5))
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->size(40),

                Tables\Columns\TextColumn::make('title')
                    ->limit(25),

                Tables\Columns\TextColumn::make('excerpt')
                    ->limit(25),
            ])
            ->paginated(false)
            ->recordUrl(fn ($record) => route('filament.admin.resources.blogs.edit', $record));
    }
}
