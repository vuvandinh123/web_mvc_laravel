<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = '2121110393_contact';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'title',
        'content',
        'replay_id',
        'updated_by',
    ];
}
