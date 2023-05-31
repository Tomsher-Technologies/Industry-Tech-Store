<?php

namespace App\Models\Frontend;

use App\Models\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'mobile_image',
        'link_type',
        'link_ref',
        'link_ref_id',
        'link',
        'sort_order',
        'status',
    ];

    public function mainImage()
    {
        return $this->hasOne(Upload::class, 'id', 'image');
    }
    public function mobileImage()
    {
        return $this->hasOne(Upload::class, 'id', 'mobile_image');
    }
}
