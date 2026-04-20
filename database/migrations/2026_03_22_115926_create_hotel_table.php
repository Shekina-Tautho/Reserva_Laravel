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
        Schema::create('hotel', function (Blueprint $table) {
            $table->id('hotel_id');
            $table->string('name');
            $table->text('overview');

            //FK
            $table->foreignId('address_id')
                ->constrained('address', 'address_id')
                ->onDelete('cascade');

            $table->integer('min_capacity');
            $table->integer('max_capacity')->nullable();
            $table->integer('min_rate');
            $table->integer('max_rate')->nullable();
            $table->integer('rating')->nullable();
            $table->text('features');
            $table->boolean('is_recommended')->default(false);
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel');
    }
};
