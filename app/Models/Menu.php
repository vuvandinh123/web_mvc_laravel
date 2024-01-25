<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = '2121110393_menu';

    protected $fillable = [
        'name',
        'link',
        'table_id',
        'type',
        'updated_by',
        'created_by',
        'sort_order',
    ];
}
