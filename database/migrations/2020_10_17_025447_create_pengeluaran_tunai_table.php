<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranTunaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran_tunai', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengeluaran_tunai');
            $table->date('tanggal');
            $table->string('jenis_pedapatan');
            $table->bigInteger('jumlah_pengeluaran');
            $table->text('keterangan');
            $table->string('divisi', 20);
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
        Schema::dropIfExists('pengeluaran_tunai');
    }
}
