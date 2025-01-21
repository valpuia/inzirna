<?php

namespace App\Observers;

use App\Models\Promotion;
use Storage;

class PromotionObserver
{
    /**
     * Handle the Promotion "saved" event.
     */
    public function saved(Promotion $promotion): void
    {
        if ($promotion->isDirty('image') && ! is_null($promotion->getOriginal('image'))) {
            Storage::disk('public')->delete($promotion->getOriginal('image'));
        }
    }

    /**
     * Handle the Promotion "deleted" event.
     */
    public function deleted(Promotion $promotion): void
    {
        if (! is_null($promotion->image)) {
            Storage::disk('public')->delete($promotion->image);
        }
    }
}
