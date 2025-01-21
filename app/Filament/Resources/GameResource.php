<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Enums\GameTypeEnum;
use App\Filament\Resources\GameResource\Pages;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\ToggleButtons::make('type')
                                    ->inline()
                                    ->options(GameTypeEnum::class)
                                    ->required(),

                                TinyEditor::make('content')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsVisibility('public')
                                    ->fileAttachmentsDirectory('games-content')
                                    ->profile('default')
                                    ->resize('both')
                                    ->required(),
                            ]),

                        Forms\Components\Section::make('Images')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->required()
                                    ->image()
                                    ->hiddenLabel()
                                    ->directory('games'),

                                Forms\Components\TextInput::make('alt')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->collapsible(),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Seo Meta')
                            ->schema([
                                Forms\Components\TextInput::make('seo_title')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('seo_description')
                                    ->label('Description')
                                    ->required()
                                    ->autosize()
                                    ->maxLength(255),

                                Forms\Components\TagsInput::make('seo_keywords')
                                    ->placeholder('Enter keywords')
                                    ->label('Keywords')
                                    ->required()
                                    ->separator(','),

                                Forms\Components\TextInput::make('seo_author')
                                    ->label('Author')
                                    ->maxLength(255),

                                Forms\Components\FileUpload::make('seo_image')
                                    ->image()
                                    ->label('Image')
                                    ->maxSize(1024)
                                    ->directory('game-seo'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->size(40),

                Tables\Columns\TextColumn::make('title')
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\TextColumn::make('type'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->hiddenLabel()
                    ->icon('heroicon-o-chevron-right'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
