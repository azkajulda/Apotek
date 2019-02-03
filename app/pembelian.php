<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    //
    public function obats()
    {
        return $this->belongsTo("App\obat", "id_obat");
    }

    public function distributor()
    {
        return $this->belongsTo("App\distributor", "id_distributor");
    }
    protected $fillable = ["id_obat", "id_distributor", "tanggal_pembelian", "qty"];
}
