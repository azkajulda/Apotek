<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pembelian')->nullable();
            $table->foreign('id_pembelian')->references('id')->on('pembelians')->onDelete('cascade');
            $table->unsignedInteger('id_penjualan');
            $table->foreign('id_penjualan')->references('id')->on('penjualans')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->integer('nominal');
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
        Schema::dropIfExists('kas');
    }
}
