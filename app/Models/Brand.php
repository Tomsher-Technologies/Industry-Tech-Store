<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Cache;

class Brand extends Model
{

  protected $fillable = [
    'name',
    'logo',
    'top',
    'slug',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'footer_title',
    'footer_content',
    'og_title',
    'og_description',
    'twitter_title',
    'twitter_description',
  ];


  public function logoImage()
  {
    return $this->hasOne(Upload::class, 'id', 'logo');
  }

  public static function boot()
  {
    static::creating(function ($model) {
      Cache::forget('brands');
    });

    static::updating(function ($model) {
      Cache::forget('brands');
    });

    static::deleting(function ($model) {
      Cache::forget('brands');
    });

    parent::boot();
  }
}
