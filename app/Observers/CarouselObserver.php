<?php

namespace App\Observers;

use App\Models\Carousel;
use Storage;

class CarouselObserver
{
    /**
     * Handle the Carousel "saved" event.
     */
    public function saved(Carousel $carousel): void
    {
        if ($carousel->isDirty('image') && ! is_null($carousel->getOriginal('image'))) {
            Storage::disk('public')->delete($carousel->getOriginal('image'));
        }
    }

    /**
     * Handle the Carousel "deleted" event.
     */
    public function deleted(Carousel $carousel): void
    {
        if (! is_null($carousel->image)) {
            Storage::disk('public')->delete($carousel->image);
        }
    }
}
