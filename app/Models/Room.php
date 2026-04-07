<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';          
    protected $primaryKey = 'room_id';
    protected $fillable = [
        'hotel_id','room_type', 'capacity', 'amenities', 'image_path', // adjust to your actual columns
    ];

    // Relationships
    public function user() {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'hotel_id');
    }
}
