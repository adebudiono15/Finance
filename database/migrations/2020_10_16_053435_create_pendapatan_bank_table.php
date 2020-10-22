<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendapatanBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatan_bank', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pendapatan_bank');
            $table->date('tanggal');
            $table->string('jenis_pedapatan');
            $table->bigInteger('jumlah_pendapatan');
            $table->text('keterangan');
            $table->string('bank', 20);
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
        Schema::dropIfExists('pendapatan_bank');
    }
}
