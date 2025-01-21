<?php

namespace App\Models;

use App\Observers\MetaDataObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(MetaDataObserver::class)]
class MetaData extends Model
{
    protected $fillable = [
        'path',
        'title',
        'image',
        'author',
        'description',
        'keywords',
    ];
}
