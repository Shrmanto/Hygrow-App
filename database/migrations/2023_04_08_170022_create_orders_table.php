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
            $table->increments('id');
            $table->date('date_order');
            $table->integer('product_id', false, true);
            $table->integer('user_id', false, true);
            $table->enum('status_payment', ['belum dibayar', 'sudah dibayar']);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->casecadeOnUpdate()->casecadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->casecadeOnUpdate()->casecadeOnDelete();
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
