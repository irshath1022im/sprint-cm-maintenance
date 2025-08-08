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
        Schema::create('cm_task_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cm_number_id');
            $table->unsignedBigInteger('task_status_id');
            $table->foreign('cm_number_id')->references('id')->on('corrective_maintenances');
            $table->foreign('task_status_id')->references('id')->on('task_statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cm_task_statuses');
    }
};
