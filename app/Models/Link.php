<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $table = '2121110393_link';
    public $timestamps = false;
    protected $fillable = [
        'table_id',
        'type',
        'slug',
    ];
}
