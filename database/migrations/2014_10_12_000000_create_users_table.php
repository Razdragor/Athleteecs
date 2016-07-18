<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->dateTime('birthday')->nullable();
            $table->string('sexe');
            $table->string('status');
            $table->boolean('activated')->default(false);
            $table->integer('score')->default(0);
            $table->string('picture')->nullable();
            $table->string('job')->nullable();
            $table->string('firm')->nullable();
            $table->string('school')->nullable();
            $table->string('address')->nullable();
            $table->boolean('newsletter')->default(false);
            $table->boolean('star')->default(false);
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
        Schema::drop('users');
    }
}
