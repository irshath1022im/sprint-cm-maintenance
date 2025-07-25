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
        Schema::create('material_receivings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_request_id');
            $table->string('batch_no');
            $table->date('receiving_date');
            $table->unsignedBigInteger('supplier_id');
            $table->integer('qty');
            $table->integer('unit_price');
            $table->integer('total');
            $table->string('remark')->nullable();
            $table->foreign('material_request_id')->on('material_requests')->references('id');
            $table->foreign('supplier_id')->on('suppliers')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_receivings');
    }
};
