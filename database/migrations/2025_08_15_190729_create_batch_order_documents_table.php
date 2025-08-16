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
        Schema::create('batch_order_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_order_id');
            $table->string('path')->nullable();
            $table->text('remark')->nullable();
            $table->foreign('batch_order_id')->references('id')->on('batch_orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_order_documents');
    }
};
