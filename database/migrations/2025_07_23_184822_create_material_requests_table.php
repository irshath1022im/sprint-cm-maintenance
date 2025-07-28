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
        Schema::create('material_requests', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('cm_number_id');
            $table->string('sub_cm');
            $table->unsignedBigInteger('equipment_tag_id');
            $table->unsignedBigInteger('spare_part_id');
            $table->integer('qty');
            $table->string('status')->nullable(); //will maintain the item collected or not to close the days counting
            $table->date('expected_date')->nullable(); //this will help us to collect them items without missing
            $table->string('remarks')->nullable();
            $table->foreign('cm_number_id')->references('id')->on('corrective_maintenances');
            $table->foreign('equipment_tag_id')->references('id')->on('equipment_tags');
            $table->foreign('spare_part_id')->references('id')->on('spare_parts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_requests');
    }
};
