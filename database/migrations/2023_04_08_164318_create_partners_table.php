<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_partners');
            $table->text('address');
            $table->string('phone_number');
            $table->integer('user_id', false, true);
            $table->timestamps();

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
        Schema::dropIfExists('partners');
    }
}
