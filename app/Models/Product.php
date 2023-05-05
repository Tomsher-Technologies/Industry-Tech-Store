<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use App\Models\Products\ProductEnquiries;
use Illuminate\Support\Str;

class Product extends Model
{

    protected $fillable = [
        'name',
        'sku',
        'added_by',
        'user_id',
        'category_id',
        'brand_id',
        'video_provider',
        'video_link',
        'description',
        'unit_price',
        'purchase_price',
        'unit',
        'slug',
        'approved',
        'colors',
        'choice_options',
        'variations',
        'photos',
        'thumbnail_img',
        'return_refund',
    ];

    protected $with = ['product_translations', 'taxes'];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? App::getLocale() : $lang;
        $product_translations = $this->product_translations->where('lang', $lang)->first();
        return $product_translations != null ? $product_translations->$field : $this->$field;
    }

    public function product_translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function seo()
    {
        return $this->hasMany(ProductSeo::class);
    }

    public function getSeoTranslation($lang = "")
    {
        $lang = $lang == "" ? App::getLocale() : $lang;
        return $this->seo->where('lang', $lang)->first();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', 1);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function taxes()
    {
        return $this->hasMany(ProductTax::class);
    }

    public function flash_deal_product()
    {
        return $this->hasOne(FlashDealProduct::class);
    }

    public function bids()
    {
        return $this->hasMany(AuctionProductBid::class);
    }

    public function scopePhysical($query)
    {
        return $query->where('digital', 0);
    }

    // public function enquiries()
    // {
    //     return $this->belongsToMany(ProductEnquiries::class, 'product_product_enquiry');
    // }

    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
