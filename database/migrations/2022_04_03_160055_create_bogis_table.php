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
        Schema::create('bogis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('train_id');
            $table->unsignedBigInteger('style')->default(1);
            $table->timestamps();

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
        Schema::dropIfExists('bogis');
    }
};
