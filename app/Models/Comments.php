<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = '2121110393_comments';

    protected $fillable = [
        'content',
        'user_id',
        'post_id',
    ];
}
