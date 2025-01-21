<?php

namespace App\Observers;

use App\Models\Game;
use Storage;

class GameObserver
{
    /**
     * Handle the Game "saved" event.
     */
    public function saved(Game $game): void
    {
        if ($game->isDirty('image') && ! is_null($game->getOriginal('image'))) {
            Storage::disk('public')->delete($game->getOriginal('image'));
        }

        if ($game->isDirty('seo_image') && ! is_null($game->getOriginal('seo_image'))) {
            Storage::disk('public')->delete($game->getOriginal('seo_image'));
        }
    }

    /**
     * Handle the Game "deleted" event.
     */
    public function deleted(Game $game): void
    {
        if (! is_null($game->image)) {
            Storage::disk('public')->delete($game->image);
        }

        if (! is_null($game->seo_image)) {
            Storage::disk('public')->delete($game->seo_image);
        }
    }
}
