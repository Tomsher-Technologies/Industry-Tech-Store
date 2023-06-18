<?php

namespace App\Models\Classifieds;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassifiedListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'content',
        'slug',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'og_title',
        'og_description',
        'twitter_title',
        'twitter_description',
    ];

    function category()
    {
        return $this->belongsTo(ClassifiedCategory::class, 'category_id');
    }
}
