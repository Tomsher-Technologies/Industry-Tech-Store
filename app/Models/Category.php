<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Cache;

class Category extends Model
{

    protected $fillable = [
        'parent_id',
        'level',
        'name',
        'order_level',
        'banner',
        'icon',
        'featured',
        'top',
        'slug',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'twitter_title',
        'twitter_description',
        'meta_keyword',
        'footer_title',
        'footer_content',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function classified_products()
    {
        return $this->hasMany(CustomerProduct::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function banner()
    {
        return $this->hasOne(Upload::class, 'id', 'banner');
    }
    public function icon()
    {
        return $this->hasOne(Upload::class, 'id', 'icon');
    }

    public static function boot()
    {
        static::creating(function ($model) {
            Cache::forget('categories');
        });

        static::updating(function ($model) {
            Cache::forget('categories');
        });

        static::deleting(function ($model) {
            Cache::forget('categories');
        });

        parent::boot();
    }
}
