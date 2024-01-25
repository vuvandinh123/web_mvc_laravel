<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = '2121110393_image';

    protected $fillable = [
        'product_id',
        'name',
    ];
}
