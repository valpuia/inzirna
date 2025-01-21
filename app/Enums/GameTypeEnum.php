<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum GameTypeEnum: string implements HasColor, HasIcon, HasLabel
{
    case Slots = 'slots';
    case Live = 'live';
    case Fishing = 'fishing';
    case Sports = 'sports';
    case Table = 'table';
    case Arcade = 'arcade';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Slots => 'danger',
            self::Live => 'gray',
            self::Fishing => 'info',
            self::Sports => 'primary',
            self::Table => 'success',
            self::Arcade => 'warning',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Slots => 'heroicon-m-adjustments-horizontal',
            self::Live => 'heroicon-m-bolt',
            self::Fishing => 'heroicon-m-cube-transparent',
            self::Sports => 'heroicon-m-trophy',
            self::Table => 'heroicon-m-table-cells',
            self::Arcade => 'heroicon-m-cursor-arrow-rays',
        };
    }
}
