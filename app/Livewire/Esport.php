<?php

namespace App\Livewire;

use App\Enums\MetaUrl;
use App\Models\MetaData;
use Livewire\Component;

class Esport extends Component
{
    public $seo;

    public function mount(): void
    {
        $this->seo = MetaData::where('path', MetaUrl::esport)
            ->select(['title', 'image', 'author', 'description', 'keywords'])
            ->first();
    }

    public function render()
    {
        return view('livewire.esport');
    }
}
