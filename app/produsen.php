<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produsen extends Model
{
    public function produsens()
    {
        return $this->hasMany("App\obat", "id");
    }
    protected $fillable = [
        'nama_pabrik', 'alamat', 'telepon'
    ];
}
