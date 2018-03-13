<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perawat extends Model
{
    protected $table = 'perawats';
    protected $fillable = ['nama','pasien_id'];
    public $timestamps = true;

    public function pasien()
	{
		return $this->belongsTo('App\pasien','pasien_id');
	}
}
