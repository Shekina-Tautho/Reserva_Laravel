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
        'address_id',
        'min_capacity',
        'max_capacity',
        'min_rate',
        'max_rate',
        'rating',
        'features',
        'is_recomended',
        'image_path'
    ];

    //Relationships
    public function address() {
        return $this->belongsTo(AddressModel::class, 'address_id', 'address_id');
    }
}
