<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orde', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->string('kode_barang');
            $table->text('tgl_pesan');
            $table->string('jumlah_pesanan');
            $table->integer('id_cutomers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orde');
    }
}
