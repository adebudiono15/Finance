<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiutangLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piutang_line', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('piutang');
            $table->bigInteger('barang');
            $table->bigInteger('harga');
            $table->bigInteger('qty');
            $table->bigInteger('grand_total');
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
        Schema::dropIfExists('piutang_line');
    }
}
