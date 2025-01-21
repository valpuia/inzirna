<?php

namespace App\Models;

use App\Observers\BlogObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(BlogObserver::class)]
class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'excerpt',
        'alt',
        'seo_title',
        'seo_image',
        'seo_author',
        'seo_description',
        'seo_keywords',
    ];
}
