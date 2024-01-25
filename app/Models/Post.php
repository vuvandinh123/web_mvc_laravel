<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = '2121110393_post';

    protected $fillable = [
        'name',
        'topic_id',
        'title',
        'slug',
        'detail',
        'image',
        'type',
        'metakey',
        'metadesc',
        'updated_by',
        'created_by',
    ];
}
