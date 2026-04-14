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
        Schema::create('room', function (Blueprint $table) {
            $table->id('room_id');

            //FK
            $table->foreignId('hotel_id')
                ->constrained('hotel', 'hotel_id')
                ->onDelete('cascade');
            
            $table->string('room_type');
            $table->string('capacity');
            $table->string('amenities');
            $table->string('no_of_beds');
            $table->double('room_rates');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};
