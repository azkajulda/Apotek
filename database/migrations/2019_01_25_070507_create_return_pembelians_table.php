<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('cascade');
            $table->unsignedInteger('id_distributor');
            $table->foreign('id_distributor')->references('id')->on('distributors')->onDelete('cascade');
            $table->integer('qty');
            $table->date('tanggal_return');
            $table->string('keterangan');
            $table->tinyInteger('returned')->default(0);
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
        Schema::dropIfExists('return_pembelians');
    }
}
