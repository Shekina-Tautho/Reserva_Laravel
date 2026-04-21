<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
#use carbon\Carbon; #To calculate number of nights between dates

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'user_id',
        'hotel_id',
        'room_id',
        'employee_id',
        'check_in_date',
        'check_out_date',
        'request',
        'total_amount',
        'proof_image_path',
        'status',
    ];

    // Relationships
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'hotel_id');
    }

    public function room() {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    /*
    public function getTotalAmount() {
        $checkInDate = Carbon::parse($this->check_in_date);
        $checkOutDate = Carbon::parse($this->check_out_date);
        $nights = $checkInDate->diffInDays($checkOutDate);
        $totalAmount = $nights * $this->room->room_rates;
        return $totalAmount;
    }
    */

}
