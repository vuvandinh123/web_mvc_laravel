<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = '2121110393_product';

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'price',
        'price_sale',
        'image',
        'qty',
        'detail',
        'metakey',
        'metadesc',
        'updated_by',
    ];
}