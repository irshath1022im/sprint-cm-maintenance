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
        Schema::create('cm_equipment_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cm_number_id');
            $table->foreign('cm_number_id')->references('id')->on('corrective_maintenances');
            $table->unsignedBigInteger('equipment_tag_id');
            $table->foreign('equipment_tag_id')->references('id')->on('equipment_tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cm_equipment_tags');
    }
};
