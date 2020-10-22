<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryHutangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_hutang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hutang');
            $table->bigInteger('kode_hutang');
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
        Schema::dropIfExists('history_hutang');
    }
}
