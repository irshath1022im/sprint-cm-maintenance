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
        Schema::create('equipment_part_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_part_number');
            $table->unsignedBigInteger('equipment_id');
            $table->timestamps();
            $table->foreign('equipment_id')->references('id')->on('equipment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_part_numbers');
    }
};
