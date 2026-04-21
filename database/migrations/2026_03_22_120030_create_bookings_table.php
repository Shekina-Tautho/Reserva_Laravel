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
                ->constrained('users', 'user_id')
                ->onDelete('cascade');

            //FK
            $table->foreignId('hotel_id')
                ->constrained('hotel', 'hotel_id')
                ->onDelete('cascade');

            //FK
            $table->foreignId('room_id')
                ->constrained('room', 'room_id')
                ->onDelete('cascade');

            //FK
            $table->foreignId('employee_id')
                ->nullable()
                ->constrained('employee', 'employee_id')
                ->onDelete('cascade');

            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->text('request')->nullable();
            $table->double('total_amount')->nullable();
            $table->string('proof_image_path')->nullable();
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
