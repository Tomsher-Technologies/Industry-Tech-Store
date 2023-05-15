<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'heading',
        'content',
    ];
}
