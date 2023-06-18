<?php

namespace App\Models\Classifieds;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassifiedCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'level',
        'order_level',
        'title',
        'image',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'og_title',
        'og_description',
        'twitter_title',
        'twitter_description',
        'status',
    ];

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function categories()
    {
        return $this->hasMany(ClassifiedCategory::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(ClassifiedCategory::class, 'parent_id')->with('categories');
    }
}
