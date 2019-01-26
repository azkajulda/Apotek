<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_konsumen')->unique();
            $table->string('nama_konsumen');
            $table->string('type_konsumen');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('jk');
            $table->date('tgl_lahir');
            $table->string('pekerjaan');
            $table->string('agama');

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
        Schema::dropIfExists('konsumens');
    }
}
