<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('slug');
            $table->longText('catalog_description')->nullable();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
        Schema::table('catalogs', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('catalogs')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalogs');
    }
}
