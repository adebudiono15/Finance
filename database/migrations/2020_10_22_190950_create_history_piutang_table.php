<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPiutangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_piutang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('piutang');
            $table->bigInteger('kode_piutang');
            $table->bigInteger('total_pembayaran');
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
        Schema::dropIfExists('history_piutang');
    }
}
