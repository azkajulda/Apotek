<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    //
    public function obats()
    {
        return $this->belongsTo("App\obat", "id_obat");
    }

    public function konsumen()
    {
        return $this->belongsTo("App\konsumen", "id_konsumen");
    }
    protected $fillable = [
        "id_obat",
        "id_konsumen",
        "id_dokter",
        "tanggal_penjualn",
        "qty"
    ];
}
