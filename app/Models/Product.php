<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_short_des',
        'product_long_des',
        'product_price',
        'category_name',
        'sub_category_name',
        'category_id',
        'sub_category_id',
        'product_img',
        'slug',
    ];
}
