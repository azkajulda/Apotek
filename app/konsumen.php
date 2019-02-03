<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konsumen extends Model
{
    //
    public function dokter()
    {
        return $this->hasMany("App\penjualan", "id_konsumen");
    }
}
