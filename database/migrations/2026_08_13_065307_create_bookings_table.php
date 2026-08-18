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
            $table->id();
            $table->string('type'); // tour, fun_activity, hotel_transfer, airport_transfer, car_rental
            $table->string('item_title')->nullable(); // Name of the Tour or Activity
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->date('booking_date')->nullable();
            $table->integer('total_person')->nullable();
            $table->json('details')->nullable(); // JSON field to store specific data
            $table->string('status')->default('Pending'); // Pending, Confirmed, Cancelled
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
