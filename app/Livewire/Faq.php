<?php

namespace App\Livewire;

use App\Enums\MetaUrl;
use App\Models\MetaData;
use Livewire\Component;

class Faq extends Component
{
    public $faqs;

    public $seo;

    public function mount(): void
    {
        $this->faqs = \App\Models\Faq::all();

        $this->seo = MetaData::where('path', MetaUrl::faqs)
            ->select(['title', 'image', 'author', 'description', 'keywords'])
            ->first();
    }

    public function render()
    {
        return view('livewire.faq');
    }
}
