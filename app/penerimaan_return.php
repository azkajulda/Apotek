<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penerimaan_return extends Model
{
    //
    protected $fillable = [
        "id_obat",
        "id_distributor",
        "qty",
        "tanggal_penerimaan",
        "keterangan"
    ];
}
