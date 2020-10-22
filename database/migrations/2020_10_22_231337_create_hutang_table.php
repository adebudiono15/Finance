<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHutangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hutang', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('kode_hutang');
            $table->bigInteger('nama_supplier_id');
            $table->bigInteger('sisa');
            $table->bigInteger('barang');
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
        Schema::dropIfExists('hutang');
    }
}
