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
        Schema::create('meterial_requests', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('sub_cm');
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('equipment_tag_id');
            $table->string('status'); //will maintain the item collected or not to close the days counting
            $table->date('expected_date'); //this will help us to collect them items without missing
            $table->string('remarks')->nullable();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->foreign('equipment_tag_id')->references('id')->on('equipment_tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meterial_requests');
    }
};
