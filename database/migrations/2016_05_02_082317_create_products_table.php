<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ean',50)->nullable();
            $table->string('name',100);
            $table->string('description');
            $table->string('picture')->nullable();
            $table->integer('note')->nullable();
            $table->boolean('active')->default(false);
            $table->decimal('price')->nullable();
            $table->string('url')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('sport_id')->nullable();
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
        Schema::drop('products');
    }
}
