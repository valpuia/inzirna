<?php

namespace App\Livewire;

use App\Enums\MetaUrl;
use App\Models\MetaData;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Announcement extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $seo;

    public function mount(): void
    {
        $this->seo = MetaData::where('path', MetaUrl::announcements)
            ->select(['title', 'image', 'author', 'description', 'keywords'])
            ->first();
    }

    public function render()
    {
        return view('livewire.announcement', [
            'announcements' => \App\Models\Announcement::latest()
                ->simplePaginate(8, ['title', 'detail']),
        ]);
    }
}
