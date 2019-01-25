<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obats');
            $table->unsignedInteger('id_konsumen');
            $table->foreign('id_konsumen')->references('id')->on('konsumens');
            $table->unsignedInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('dokters');
            $table->date('tanggal_penjualan');
            $table->integer('qty');
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
        Schema::dropIfExists('penjualans');
    }
}
