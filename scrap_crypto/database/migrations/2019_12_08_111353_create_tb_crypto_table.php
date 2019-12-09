<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCryptoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_crypto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chg24h');
            $table->string('chg7d');
            $table->timestamp('created');
            $table->float('marcap');
            $table->string('name');
            $table->float('price');
            $table->string('symbol');
            $table->float('vol24h');
            $table->string('voltot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_crypto');
    }
}
