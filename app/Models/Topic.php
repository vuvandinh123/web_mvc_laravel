<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = '2121110393_topic';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'metakey',
        'metadesc',
        'created_by',
        'updated_by',
    ];
}
