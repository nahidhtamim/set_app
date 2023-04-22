<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloths', function (Blueprint $table) {
            $table->id();
            $table->string('hexa_code');
            $table->integer('customer_id');
            $table->integer('order_id');
            $table->integer('service_id');
            $table->integer('set_id');
            $table->string('cloth_type');
            $table->string('size');
            $table->string('color');
            $table->string('fabric');
            $table->string('weight');
            $table->string('brand');
            $table->string('image')->nullable();
            $table->tinyInteger('wash_program_number')->default('0');
            $table->tinyInteger('dryer_program_number')->default('0');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cloths');
    }
};
