<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_returns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('cascade');
            $table->unsignedInteger('id_distributor');
            $table->foreign('id_distributor')->references('id')->on('distributors')->onDelete('cascade');
            $table->date('tanggal_penerimaan');
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
        Schema::dropIfExists('penerimaan_returns');
    }
}
