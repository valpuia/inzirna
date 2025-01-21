<?php

namespace App\Filament\Pages;

use App\Models\Script;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ScriptTag extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Seo & Pages';

    protected static string $view = 'filament.pages.script-tag';

    public ?array $data = [];

    public function mount(): void
    {
        $script = Script::first();

        if ($script) {
            $this->form->fill(['script' => $script->script]);
        } else {
            $this->form->fill();
        }
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Script for <head>')
                    ->description('Be careful what you put, this can lead to XSS vulnerability!')
                    ->aside()
                    ->icon('heroicon-o-command-line')
                    ->iconColor('primary')
                    ->schema([
                        Forms\Components\Textarea::make('script')
                            ->hiddenLabel()
                            ->autosize()
                            ->required(),
                    ])
                    ->footerActions([
                        Forms\Components\Actions\Action::make('save')
                            ->label('Save')
                            ->submit('save'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $script = Script::first();

        if ($script) {
            $script->update($this->form->getState());
        } else {
            Script::create($this->form->getState());
        }

        Notification::make()
            ->title('Script save successfully')
            ->success()
            ->send();
    }
}
