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
            $table->string('name', 100)->unique();
            $table->string('sku')->nullable();
            $table->integer('catalog_id')->unsigned();
            $table->string('slug');
            $table->integer('brand_id')->nullable()->unsigned();
            $table->string('made_in')->nullable();
            $table->string('material')->nullable();
            $table->integer('regular_price');
            $table->integer('sale_price');
            $table->integer('discount'); // if (regular_price - sale_price) / regular_price => discount = 22
            $table->integer('counter')->default(0);
            $table->integer('view')->default(0);
            $table->string('image_link')->nullable();
            $table->string('product_description')->nullable();
            $table->longText('image_catalog')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('catalog_id')->references('id')->on('catalogs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
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
