<?php

namespace App\Filament\Pages;

use App\Enums\MetaUrl;
use App\Models\MetaData;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SeoMeta extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?int $navigationSort = 1;

    protected ?string $subheading = 'All seo metadata for static pages';

    protected static ?string $navigationGroup = 'Seo & Pages';

    protected static string $view = 'filament.pages.seo-meta';

    public ?array $homeSeo = [];

    public ?array $slotsSeo = [];

    public ?array $livesSeo = [];

    public ?array $fishingsSeo = [];

    public ?array $sportsSeo = [];

    public ?array $tablesSeo = [];

    public ?array $arcadesSeo = [];

    public ?array $esportSeo = [];

    public ?array $promotionsSeo = [];

    public ?array $blogsSeo = [];

    public ?array $faqsSeo = [];

    public ?array $announcementsSeo = [];

    public ?array $gaming21Seo = [];

    public ?array $responsibleGamingSeo = [];

    public function mount(): void
    {
        $this->populateSeoFormData(path: MetaUrl::home->value, form: 'homeForm');
        $this->populateSeoFormData(path: MetaUrl::slots->value, form: 'slotsForm');
        $this->populateSeoFormData(path: MetaUrl::lives->value, form: 'livesForm');
        $this->populateSeoFormData(path: MetaUrl::fishings->value, form: 'fishingsForm');
        $this->populateSeoFormData(path: MetaUrl::sports->value, form: 'sportsForm');
        $this->populateSeoFormData(path: MetaUrl::tables->value, form: 'tablesForm');
        $this->populateSeoFormData(path: MetaUrl::arcades->value, form: 'arcadesForm');
        $this->populateSeoFormData(path: MetaUrl::esport->value, form: 'esportForm');
        $this->populateSeoFormData(path: MetaUrl::promotions->value, form: 'promotionsForm');
        $this->populateSeoFormData(path: MetaUrl::blogs->value, form: 'blogsForm');
        $this->populateSeoFormData(path: MetaUrl::faqs->value, form: 'faqsForm');
        $this->populateSeoFormData(path: MetaUrl::announcements->value, form: 'announcementsForm');
        $this->populateSeoFormData(path: MetaUrl::gaming21->value, form: 'gaming21Form');
        $this->populateSeoFormData(path: MetaUrl::responsibleGaming->value, form: 'responsibleGamingForm');
    }

    public function populateSeoFormData($path, $form)
    {
        $data = MetaData::where('path', $path)->first();

        if ($data) {
            $this->$form->fill([
                'title' => $data->title,
                'keywords' => $data->keywords,
                'image' => $data->image,
                'description' => $data->description,
                'author' => $data->author,
            ]);
        } else {
            $this->$form->fill();
        }
    }

    protected function getForms(): array
    {
        return [
            'homeForm',
            'slotsForm',
            'livesForm',
            'fishingsForm',
            'sportsForm',
            'tablesForm',
            'arcadesForm',
            'esportForm',
            'promotionsForm',
            'blogsForm',
            'faqsForm',
            'announcementsForm',
            'gaming21Form',
            'responsibleGamingForm',
        ];
    }

    public function seoForms($label, $collapsed, $action, $icon): array
    {
        return [
            Forms\Components\Section::make($label)
                ->collapsible()
                ->collapsed($collapsed)
                ->compact()
                ->icon($icon)
                ->iconColor('primary')
                ->persistCollapsed()
                ->schema([
                    Forms\Components\Textarea::make('title')
                        ->required()
                        ->inlineLabel()
                        ->autosize()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->inlineLabel()
                        ->autosize()
                        ->maxLength(255),

                    Forms\Components\TagsInput::make('keywords')
                        ->placeholder('Enter keywords')
                        ->separator(',')
                        ->inlineLabel()
                        ->required(),

                    Forms\Components\TextInput::make('author')
                        ->label('Author')
                        ->inlineLabel()
                        ->maxLength(255),

                    Forms\Components\FileUpload::make('image')
                        ->directory('seo-meta')
                        ->image()
                        ->inlineLabel()
                        ->maxSize(1024),
                ])
                ->footerActions([
                    Forms\Components\Actions\Action::make('save')
                        ->label('Save')
                        ->submit($action),
                ]),
        ];

    }

    public function homeForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Home',
                collapsed: false,
                action: 'saveHomeSeo',
                icon: 'heroicon-o-home'
            ))
            ->statePath('homeSeo');
    }

    public function slotsForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Slots',
                collapsed: false,
                action: 'saveSlotsSeo',
                icon: 'heroicon-o-adjustments-horizontal'
            ))
            ->statePath('slotsSeo');
    }

    public function livesForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Lives',
                collapsed: true,
                action: 'saveLivesSeo',
                icon: 'heroicon-o-bolt'
            ))
            ->statePath('livesSeo');
    }

    public function fishingsForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Fishings',
                collapsed: true,
                action: 'saveFishingsSeo',
                icon: 'heroicon-o-cube-transparent'
            ))
            ->statePath('fishingsSeo');
    }

    public function sportsForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Sports',
                collapsed: true,
                action: 'saveSportsSeo',
                icon: 'heroicon-o-trophy'
            ))
            ->statePath('sportsSeo');
    }

    public function tablesForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Tables',
                collapsed: true,
                action: 'saveTablesSeo',
                icon: 'heroicon-o-table-cells'
            ))
            ->statePath('tablesSeo');
    }

    public function arcadesForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Arcades',
                collapsed: true,
                action: 'saveArcadesSeo',
                icon: 'heroicon-o-cursor-arrow-rays'
            ))
            ->statePath('arcadesSeo');
    }

    public function esportForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'esport',
                collapsed: true,
                action: 'saveEsportSeo',
                icon: 'heroicon-o-computer-desktop'
            ))
            ->statePath('esportSeo');
    }

    public function promotionsForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'promotions',
                collapsed: true,
                action: 'savePromotionsSeo',
                icon: 'heroicon-o-gift-top'
            ))
            ->statePath('promotionsSeo');
    }

    public function blogsForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Blogs',
                collapsed: true,
                action: 'saveBlogsSeo',
                icon: 'heroicon-o-newspaper'
            ))
            ->statePath('blogsSeo');
    }

    public function faqsForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Faqs',
                collapsed: true,
                action: 'saveFaqsSeo',
                icon: 'heroicon-o-question-mark-circle'
            ))
            ->statePath('faqsSeo');
    }

    public function gaming21Form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: '21+ gaming',
                collapsed: true,
                action: 'saveGaming21Seo',
                icon: 'heroicon-o-ticket'
            ))
            ->statePath('gaming21Seo');
    }

    public function announcementsForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Announcements',
                collapsed: true,
                action: 'saveAnnouncementsSeo',
                icon: 'heroicon-o-megaphone'
            ))
            ->statePath('announcementsSeo');
    }

    public function responsibleGamingForm(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema($this->seoForms(
                label: 'Responsible Gaming',
                collapsed: true,
                action: 'saveResponsibleGamingSeo',
                icon: 'heroicon-o-viewfinder-circle'
            ))
            ->statePath('responsibleGamingSeo');
    }

    public function saveHomeSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::home->value,
            data: $this->homeForm->getState(),
            message: 'Home seo updated successfully'
        );
    }

    public function saveSlotsSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::slots->value,
            data: $this->slotsForm->getState(),
            message: 'Slots seo updated successfully'
        );
    }

    public function saveLivesSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::lives->value,
            data: $this->livesForm->getState(),
            message: 'Live seo updated successfully'
        );
    }

    public function saveFishingsSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::fishings->value,
            data: $this->fishingsForm->getState(),
            message: 'Fishings seo updated successfully'
        );
    }

    public function saveSportsSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::sports->value,
            data: $this->sportsForm->getState(),
            message: 'Sports seo updated successfully'
        );
    }

    public function saveTablesSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::tables->value,
            data: $this->tablesForm->getState(),
            message: 'Tables seo updated successfully'
        );
    }

    public function saveArcadesSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::arcades->value,
            data: $this->arcadesForm->getState(),
            message: 'Arcade seo updated successfully'
        );
    }

    public function saveEsportSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::esport->value,
            data: $this->esportForm->getState(),
            message: 'E-sport seo updated successfully'
        );
    }

    public function savePromotionsSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::promotions->value,
            data: $this->promotionsForm->getState(),
            message: 'Promotion seo updated successfully'
        );
    }

    public function saveBlogsSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::blogs->value,
            data: $this->blogsForm->getState(),
            message: 'Blogs seo updated successfully'
        );
    }

    public function saveFaqsSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::faqs->value,
            data: $this->faqsForm->getState(),
            message: 'Faqs seo updated successfully'
        );
    }

    public function saveAnnouncementsSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::announcements->value,
            data: $this->announcementsForm->getState(),
            message: 'Announcements seo updated successfully'
        );
    }

    public function saveGaming21Seo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::gaming21->value,
            data: $this->gaming21Form->getState(),
            message: '21+ gaming seo updated successfully'
        );
    }

    public function saveResponsibleGamingSeo(): void
    {
        $this->saveSeoData(
            path: MetaUrl::responsibleGaming->value,
            data: $this->responsibleGamingForm->getState(),
            message: 'Responsible gaming seo updated successfully'
        );
    }

    public function saveSeoData($path, $data, $message)
    {
        MetaData::updateOrCreate(
            attributes: ['path' => $path],
            values: $data
        );

        $this->sendNotification(message: $message);
    }

    public function sendNotification($message): void
    {
        Notification::make()
            ->title(title: 'Saved')
            ->body(body: $message)
            ->success()
            ->send();
    }
}
