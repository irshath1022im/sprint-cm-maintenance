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
        Schema::create('corrective_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('cm_number');
            $table->unsignedBigInteger('technician_id');
            $table->unsignedBigInteger('equipment_id');
            $table->date('request_date');
            $table->string('status');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->foreign('technician_id')->references('id')->on('technicians');
            $table->foreign('equipment_id')->references('id')->on('equipment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corrective_maintenances');
    }
};
