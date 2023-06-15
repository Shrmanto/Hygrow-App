<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableInvestDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invest_details', function ( Blueprint $table) {
            $table->enum('status_payment', ['belum dibayar', 'sudah dibayar'])->add();
            $table->enum('status_wd', ['belum wd', 'sudah wd'])->add();
            
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
