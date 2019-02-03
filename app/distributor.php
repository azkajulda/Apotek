<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class distributor extends Model
{
    //
    public function distributor()
    {
        return $this->hasMany("App\pembelians", "id_distributor");
    }
    protected $fillable = [
        'kode_distributor', 'nama_distributor', 'alamat', 'kota', 'telepon', 'no_rek', 'Email'
    ];
}
