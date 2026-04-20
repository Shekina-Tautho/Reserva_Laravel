<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'address_id';

    protected $fillable = [
        'country',
        'administrative_area',
        'locality',
        'postal_code',
        'thoroughfare',
    ];
}
