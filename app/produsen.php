<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produsen extends Model
{
    //
    protected $fillable = [
        'nama_pabrik', 'alamat', 'telepon'
    ];
}
