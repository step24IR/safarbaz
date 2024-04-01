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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('scale')->default(0);
            $table->unsignedInteger('capacity')->default(0);
            $table->unsignedInteger('extra_people')->default(0);
            $table->unsignedBigInteger('price_per_extra_people')->default(0);
            $table->unsignedBigInteger('price_per_holiday')->default(0);
            $table->unsignedBigInteger('price_per_non_holiday')->default(0);
            $table->foreignId('city_id')->constrained('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('village')->nullable();
            $table->unsignedInteger('number_of_rooms');
            $table->unsignedInteger('number_of_bedrooms');
            $table->unsignedInteger('number_of_bed_one');
            $table->unsignedInteger('number_of_bed_two');
            $table->unsignedInteger('number_of_wc_iranian');
            $table->unsignedInteger('number_of_wc_frangi');
            $table->unsignedInteger('number_of_tub_bathroom');
            $table->unsignedInteger('number_of_normal_bathroom');
            $table->string('floor');
            $table->string('textureAndView')->nullable();
            $table->string('address');
            $table->boolean('exclusive');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
