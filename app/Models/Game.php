<?php

namespace App\Models;

use App\Enums\GameTypeEnum;
use App\Observers\GameObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(GameObserver::class)]
class Game extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'user_id',
        'image',
        'alt',
        'slug',
        'seo_title',
        'seo_image',
        'seo_author',
        'seo_description',
        'seo_keywords',
    ];

    protected function casts(): array
    {
        return [
            'type' => GameTypeEnum::class,
        ];
    }
}
