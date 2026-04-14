<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';
    protected $primaryKey = 'hotel_id';

    protected $fillable = [
        'name',
        'overview',
        'address',
        'is_recomended',
        'image_path',
    ];
}
