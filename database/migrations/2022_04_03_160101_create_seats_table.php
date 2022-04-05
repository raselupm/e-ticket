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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('bogi_id');
            $table->unsignedBigInteger('train_id');
            $table->unsignedBigInteger('booked')->default(0)->comment('0=open,1=booked');
            $table->timestamps();

            $table->foreign('bogi_id')->references('id')->on('bogis')->onDelete('cascade');
            $table->foreign('train_id')->references('id')->on('trains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
};
