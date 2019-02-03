<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('cascade');
            $table->unsignedInteger('id_distributor');
            $table->foreign('id_distributor')->references('id')->on('distributors')->onDelete('cascade');
            $table->unsignedInteger('id_kas');
            $table->foreign('id_kas')->references('id')->on('kas')->onDelete('cascade');
            $table->date('tanggal_pembelian');
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
        Schema::dropIfExists('pembelians');
    }
}
