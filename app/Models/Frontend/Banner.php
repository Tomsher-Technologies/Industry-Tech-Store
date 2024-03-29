<?php

namespace App\Models\Frontend;

use App\Models\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
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
        'status',
    ];
}
