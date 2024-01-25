<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = '2121110393_brand';

    protected $fillable = [
        'name',
        'image',
        'slug',
        'sort_order',
        'metakey',
        'metadesc',
        'updated_by',
        'created_by',
    ];
}
