<?php

namespace App\Livewire;

use App\Enums\MetaUrl;
use App\Models\MetaData;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithoutUrlPagination, WithPagination;

    #[Url(as: 'q')]
    public ?string $search;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.blog', [
            'blogs' => \App\Models\Blog::latest()
                ->when($this->search ?? null, fn ($query) => $query->whereAny(
                    ['title', 'excerpt'],
                    'LIKE',
                    "%{$this->search}%"
                ))
                ->simplePaginate(9, ['slug', 'image', 'title', 'created_at', 'excerpt', 'alt']),

            'seo' => MetaData::where('path', MetaUrl::blogs)
                ->select(['title', 'image', 'author', 'description', 'keywords'])
                ->first(),
        ]);
    }
}
