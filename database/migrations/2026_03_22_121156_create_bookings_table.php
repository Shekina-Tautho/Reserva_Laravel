<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');//PK

            //FK
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            //FK
            $table->foreignId('hotel_id')
                ->constrained('hotel')
                ->onDelete('cascade');

            //FK
            $table->foreignId('room_id')
                ->constrained('room')
                ->onDelete('cascade');

            //FK
            $table->foreignId('employee_id')
                ->constrained('employee')
                ->onDelete('cascade');
                
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->string('status');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
