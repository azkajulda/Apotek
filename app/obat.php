<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    public function obats()
    {
        return $this->belongsTo("App\produsen", "id_produsen");
    }

    public function obat()
    {
        return $this->hasMany('App\pembelians', 'id_obat');
    }

    protected $fillable = [
        "kode_obat", "id_produsen", "nama_obat", "kategori", "jenis_obat", "tgl_kadaluarsa", "harga_beli", "harga_jual", "stok"
    ];
}
