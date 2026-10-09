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
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['tour', 'custom'])->default('tour');
            $table->string('tour_id')->nullable();          // references tour.id (string, non-incrementing)
            $table->string('image_path')->nullable();       // for custom uploads
            $table->string('caption')->nullable();          // optional overlay text
            $table->unsignedInteger('order')->default(0);   // display order
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
