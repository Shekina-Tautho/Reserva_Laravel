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
        Schema::create('tags', function (Blueprint $table) {
            //FK (hotelID)
            $table->foreignId('hotel_id')
                ->constrained('hotel', 'hotel_id')
                ->onDelete('cascade');
            
            $table->boolean('is_smoking');
            $table->boolean('is_nonsmoking');
            $table->boolean('is_petfriendly');
            $table->boolean('has_restaurant');
            $table->boolean('has_swimmingpool');
            $table->boolean('has_freewifi');
            $table->boolean('has_freebreakfast');
            $table->boolean('has_privatebalcony');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
