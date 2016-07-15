<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('picture')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('city_code')->nullable();
            $table->string('number_street')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->text('description')->nullable();
            $table->string('lattitude')->nullable();
            $table->string('longitude')->nullable();
            $table->bigInteger('user_id');
            $table->bigInteger('sport_id');
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
        Schema::drop('events');
    }
}
