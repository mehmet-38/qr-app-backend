<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'rest_name',
        'menus_id',
        'qr_link',
        'rest_photo',
        'table_count'
    ];
}
