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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_from');
            $table->unsignedBigInteger('station_to');
            $table->unsignedBigInteger('user_id');
            $table->float('price');
            $table->string('train_name');
            $table->dateTime('journey_time');
            $table->string('bogi_name');
            $table->string('seat_name');
            $table->timestamps();

            $table->foreign('station_from')->references('id')->on('stations');
            $table->foreign('station_to')->references('id')->on('stations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
