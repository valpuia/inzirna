<?php

namespace App\Livewire;

use App\Enums\MetaUrl;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\MetaData;
use Livewire\Component;

class Home extends Component
{
    public $carouselImages = [];

    public $blogs;

    public $seo;

    public function mount(): void
    {
        $this->seo = MetaData::where('path', MetaUrl::home)
            ->select(['title', 'image', 'author', 'description', 'keywords'])
            ->first();

        $this->carouselImages = Carousel::all();

        $this->blogs = Blog::latest()->take(8)->get();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
