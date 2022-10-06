<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_cart_id')->unsigned();
            $table->decimal('order_price',10,2);
            $table->string('situation',30)->nullable();
            $table->string('name_surname',50)->nullable();
            $table->string('address',200)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('mobile_phone',15)->nullable();
            $table->string('bank',20)->nullable();
            $table->integer('number_installments');
            $table->timestamps();
            $table->unique('main_cart_id');
            $table->foreign('main_cart_id')->references('id')->on('cart')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
