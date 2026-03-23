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
        Schema::create('review', function (Blueprint $table) {
            $table->id('review_id'); //PK

            //FK
            $table->foreignId('user_id')
                ->constrained('users', 'user_id')
                ->onDelete('cascade');

            //FK
            $table->foreignId('hotel_id')
                ->constrained('hotel', 'hotel_id')
                ->onDelete('cascade');

            //FK
            $table->foreignId('booking_id')
                ->constrained('bookings', 'booking_id')
                ->onDelete('cascade');

            $table->unsignedTinyInteger('rating');
            $table->string('comment');
            $table->date('review_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
