<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table='pasiens';

    protected $fillable=['nama','penyakit','dokter_id'];

    public $timestamps= true;

    public function dokter()
    {
    	return $this->BelongsTo('App\dokter','dokter_id');
    }
    public function perawat()
    {
    	return $this->hasOne('App\perawat','pasien_id');
    }
}
