<?php

namespace App\Observers;

use App\Models\Blog;
use Storage;

class BlogObserver
{
    /**
     * Handle the Blog "saved" event.
     */
    public function saved(Blog $blog): void
    {
        if ($blog->isDirty('image') && ! is_null($blog->getOriginal('image'))) {
            Storage::disk('public')->delete($blog->getOriginal('image'));
        }

        if ($blog->isDirty('seo_image') && ! is_null($blog->getOriginal('seo_image'))) {
            Storage::disk('public')->delete($blog->getOriginal('seo_image'));
        }
    }

    /**
     * Handle the Blog "deleted" event.
     */
    public function deleted(Blog $blog): void
    {
        if (! is_null($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        if (! is_null($blog->seo_image)) {
            Storage::disk('public')->delete($blog->seo_image);
        }
    }
}
