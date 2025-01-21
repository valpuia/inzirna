<?php

namespace App\Observers;

use App\Models\MetaData;
use Storage;

class MetaDataObserver
{
    /**
     * Handle the NetaData "saved" event.
     */
    public function saved(MetaData $metaData): void
    {
        if ($metaData->isDirty('image') && ! is_null($metaData->getOriginal('image'))) {
            Storage::disk('public')->delete($metaData->getOriginal('image'));
        }
    }

    /**
     * Handle the MetaData "deleted" event.
     */
    public function deleted(MetaData $metaData): void
    {
        if (! is_null($metaData->image)) {
            Storage::disk('public')->delete($metaData->image);
        }
    }
}
