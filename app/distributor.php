<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class distributor extends Model
{
    //
    protected $fillable = [
        'kode_distributor', 'nama_distributor', 'alamat', 'kota', 'telepon', 'no_rek', 'Email'
    ];
}
