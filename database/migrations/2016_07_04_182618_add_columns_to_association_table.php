<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('associations', function (Blueprint $table) {
            $table->string('city_code')->nullable();
            $table->string('number_street')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->text('description')->nullable();
            $table->string('lattitude')->nullable();
            $table->string('longitude')->nullable();
            $table->bigInteger('user_id');
            $table->bigInteger('sport_id');
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('google')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('associations', function (Blueprint $table) {
            //
        });
    }
}
