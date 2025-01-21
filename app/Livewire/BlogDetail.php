<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class BlogDetail extends Component
{
    public $blog;

    public $seo;

    public function mount($slug): void
    {
        $this->blog = Blog::where('slug', $slug)->firstOrFail();

        $this->seo = [
            'title' => $this->blog->seo_title,
            'description' => $this->blog->seo_description,
            'keywords' => $this->blog->seo_keywords,
            'author' => $this->blog->seo_author,
            'image' => $this->blog->seo_image,
        ];
    }

    public function render()
    {
        return view('livewire.blog-detail');
    }
}
