<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_invest');
            $table->string('invest_name');
            $table->string('images');
            $table->integer('price');
            $table->string('profit');
            $table->string('contract');
            $table->text('description');
            $table->integer('customer_partner_id', false, true);
            $table->timestamps();

            $table->foreign('customer_partner_id')->references('id')->on('users')->casecadeOnUpdate()->casecadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investations');
    }
}
 