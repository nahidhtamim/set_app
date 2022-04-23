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
        Schema::create('place_lockers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('place_id');
            $table->tinyInteger('service_id');
            $table->tinyInteger('locker_id');
            $table->string('name');
            $table->string('code')->unique();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('place_lockers');
    }
};
