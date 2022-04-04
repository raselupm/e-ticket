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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('train_id');
            $table->unsignedBigInteger('station_id');
            $table->time('time');
            $table->float('ac_b_price')->nullable();
            $table->float('ac_s_price')->nullable();
            $table->float('snigdha_price')->nullable();
            $table->float('f_berth_price')->nullable();
            $table->float('f_seat_price')->nullable();
            $table->float('f_chair_price')->nullable();
            $table->float('s_chair_price')->nullable();
            $table->float('shovon_price')->nullable();
            $table->timestamps();

            $table->foreign('train_id')->references('id')->on('trains');
            $table->foreign('station_id')->references('id')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
