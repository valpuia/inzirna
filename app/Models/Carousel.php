<?php

namespace App\Models;

use App\Observers\CarouselObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(CarouselObserver::class)]
class Carousel extends Model
{
    protected $fillable = [
        'links',
        'image',
        'alt',
    ];
}
