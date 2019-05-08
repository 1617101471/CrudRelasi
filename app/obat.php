<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    public function pasien()
    {
    	return $this->belongsToMany('App\pasien', 'administrasis', 'id_obat', 'id_pasien');
    }
}
