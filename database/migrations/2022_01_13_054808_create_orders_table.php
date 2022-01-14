<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('shipping_fee')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('ship_way')->nullable();
            $table->integer('pay_way')->nullable();
            $table->integer('status')->nullable();
            $table->string('order_number')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
