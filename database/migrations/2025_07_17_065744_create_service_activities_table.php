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
        Schema::create('service_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cm_number_id');
            $table->string('service_type')->nullable();
            $table->unsignedBigInteger('spare_part_id')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('total')->nullable();
            $table->longText('service_description')->nullable();
            $table->foreign('cm_number_id')->references('id')->on('corrective_maintenances');
            $table->foreign('spare_part_id')->references('id')->on('spare_parts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_activities');
    }
};
