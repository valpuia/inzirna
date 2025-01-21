<?php

namespace App\Models;

use App\Observers\PromotionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(PromotionObserver::class)]
class Promotion extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'image',
        'alt',
    ];
}
