<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('ar_start');
            $table->string('en_start');
            $table->string('ar_destination');
            $table->string('en_destination');
            $table->string('price');
            $table->string('status')->default(0);
            $table->string('image')->nullable();
            $table->date('take_off');
            $table->time('take_off_time');
            $table->date('landing');
            $table->time('landing_time');
            $table->tinyInteger('adults')->default(1);
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
        Schema::dropIfExists('flights');
    }
}
