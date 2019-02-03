<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    //
    public function dokter()
    {
        return $this->hasMany("App\penjualan", "id_dokter");
    }
}
