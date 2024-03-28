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
            $table->unsignedInteger('scale');
            $table->unsignedInteger('capacity');
            $table->unsignedInteger('extra_people');
            $table->unsignedBigInteger('price_per_extra_people');
            $table->unsignedBigInteger('price_per_holiday');
            $table->unsignedBigInteger('price_per_non_holiday');
            $table->foreignId('city_id')->constrained('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('village');
            $table->unsignedInteger('number_of_rooms');
            $table->unsignedInteger('number_of_bedrooms');
            $table->unsignedInteger('number_of_bed_one');
            $table->unsignedInteger('number_of_bed_two');
            $table->unsignedInteger('number_of_wc_iranian');
            $table->unsignedInteger('number_of_wc_frangi');
            $table->unsignedInteger('number_of_tub_bathroom');
            $table->unsignedInteger('number_of_normal_bathroom');
            $table->string('floor');
            $table->string('textureAndView');
            $table->string('address');
            $table->boolean('exclusive');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
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
