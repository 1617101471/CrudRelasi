<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    protected $table='dokters';

    protected $fillable=['nama','alamat'];

    public $timestamps= true;

    public function pasien()
    {
    	return $this->hasMany('App\pasien','dokter_id');
    }
}
