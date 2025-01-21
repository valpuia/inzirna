<?php

namespace App\Livewire;

use App\Enums\MetaUrl;
use App\Models\MetaData;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Promotion extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $seo;

    public function mount(): void
    {
        $this->seo = MetaData::where('path', MetaUrl::promotions)
            ->select(['title', 'image', 'author', 'description', 'keywords'])
            ->first();
    }

    public function render()
    {
        return view('livewire.promotion', [
            'promotions' => \App\Models\Promotion::latest()
                ->simplePaginate(6, ['image', 'title', 'description', 'url', 'alt']),
        ]);

    }
}
