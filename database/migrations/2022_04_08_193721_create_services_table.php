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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('service_name_ger')->nullable();
            $table->string('service_price')->default(00.00);
            $table->string('service_image')->default('default.jpg');
            $table->string('short_desc');
            $table->string('short_desc_ger')->nullable();
            $table->text('long_desc');
            $table->text('long_desc_ger')->nullable();
            $table->tinyInteger('service_status')->default('0');
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
        Schema::dropIfExists('services');
    }
};
