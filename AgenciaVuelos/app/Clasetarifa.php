<?php

namespace App;
use App\Ruta;
use App\Viaje;

use Illuminate\Database\Eloquent\Model;

class Clasetarifa extends Model
{
	 protected $fillable = ['clase_id', 'tarifa_id'];
    public function rutas(){
    	return $this->belongsToMany('App\Ruta','preciorutas')->withTimestamps();
    }
    public function viajes(){
    	return $this->belongsToMany('App\Viaje','viajeprecios')->withTimestamps();
    }
}
