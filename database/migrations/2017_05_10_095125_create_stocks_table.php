<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('stock')->unsigned()->default(0);

            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onUpdate('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade');

            $table->unique(['product_id', 'size_id', 'color_id']);
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
        Schema::drop('stocks');
    }
}
