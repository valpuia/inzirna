<?php

namespace App\Livewire;

use App\Enums\GameTypeEnum;
use App\Enums\MetaUrl;
use App\Models\Game;
use App\Models\MetaData;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Arcade extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $seo;

    public function mount(): void
    {
        $this->seo = MetaData::where('path', MetaUrl::arcades)
            ->select(['title', 'image', 'author', 'description', 'keywords'])
            ->first();
    }

    public function render()
    {
        return view('livewire.arcade', [
            'games' => Game::where('type', GameTypeEnum::Arcade->value)
                ->simplePaginate(12, ['slug', 'image', 'alt']),
        ]);
    }
}
