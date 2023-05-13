<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('investation_id', false, true);
            $table->integer('user_id', false, true);
            $table->timestamps();

            $table->foreign('investation_id')->references('id')->on('investations')->casecadeOnUpdate()->casecadeOnDelete();
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
        Schema::dropIfExists('invest_details');
    }
}
