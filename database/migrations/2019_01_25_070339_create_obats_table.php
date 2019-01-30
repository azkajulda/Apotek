<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_obat')->unique();
            $table->unsignedInteger('id_produsen');
            $table->foreign('id_produsen')->references('id')->on('produsens');
            $table->string('nama_obat');
            $table->string('kategori');
            $table->string('jenis_obat');
            $table->date('tgl_kadaluarsa');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok');
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
        Schema::dropIfExists('obats');
    }
}
