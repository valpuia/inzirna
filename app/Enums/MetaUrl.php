<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MetaUrl: string implements HasLabel
{
    case home = 'home';
    case slots = 'slots';
    case lives = 'lives';
    case fishings = 'fishings';
    case sports = 'sports';
    case tables = 'tables';
    case arcades = 'arcades';
    case esport = 'e-sports';
    case promotions = 'promotions';
    case blogs = 'blogs';
    case faqs = 'faqs';
    case announcements = 'announcements';
    case gaming21 = '21-gamings';
    case responsibleGaming = 'responsible-gamings';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
