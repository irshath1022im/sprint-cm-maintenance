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
        Schema::create('material_request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_request_id');
            $table->unsignedBigInteger('equipment_tag_id');
            $table->unsignedBigInteger('spare_part_id');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('material_request_id')->references('id')->on('material_requests');
            $table->foreign('equipment_tag_id')->references('id')->on('equipment_tags');
            $table->foreign('spare_part_id')->references('id')->on('spare_parts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_request_items');
    }
};
