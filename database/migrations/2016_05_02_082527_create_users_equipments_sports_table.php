<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEquipmentsSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_equips_sports', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('equipment_id');
            $table->bigInteger('sport_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_equips_sports');
    }
}
