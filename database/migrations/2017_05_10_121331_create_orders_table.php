<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status'); // handled or not
            $table->string('order_code')->unique();
            $table->integer('user_id')->nullable()->unsigned(); // in case guest can buy without logging in
            $table->string('buyer_name', 50);
            $table->string('buyer_email');
            $table->string('buyer_phone', 12);
            $table->string('buyer_address');
            $table->string('buyer_message')->nullable();
            $table->integer('amount');
            $table->longText('payment_response_info');
            $table->string('security'); // some payment methods need this field
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
