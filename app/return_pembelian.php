<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class return_pembelian extends Model
{
    //
    protected $fillable = [
        "id_obat",
        "id_distributor",
        "qty",
        "tanggal_return",
        "keterangan"
    ];
}
