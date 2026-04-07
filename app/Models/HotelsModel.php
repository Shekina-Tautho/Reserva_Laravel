<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsModel extends Model
{
    protected $table = 'hotel';

    protected $fillable = [
        'name',
        'overview',
        'address',
        'is_recommended',
        'image_path'
    ];
}
