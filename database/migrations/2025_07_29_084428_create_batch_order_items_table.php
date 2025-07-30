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
        Schema::create('batch_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_order_id');
            $table->unsignedBigInteger('equipment_tag_id');
            $table->unsignedBigInteger('spare_part_id');
            $table->unsignedBigInteger('material_request_item_id'); //line id for material_request_table, this will help to get the price from
            $table->integer('qty');
            $table->integer('unit_price');
            $table->integer('total');
            $table->string('remark')->nullable();
            $table->timestamps();
            $table->foreign('batch_order_id')->on('batch_orders')->references('id');
            $table->foreign('equipment_tag_id')->references('id')->on('equipment_tags');
            $table->foreign('spare_part_id')->references('id')->on('spare_parts');
            $table->foreign('material_request_item_id')->references('id')->on('material_request_items');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_order_items');
    }
};
