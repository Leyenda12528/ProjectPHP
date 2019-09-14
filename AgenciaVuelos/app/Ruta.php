<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ciudad;
use App\Clasetarifa;
use App\Precioruta;
use App\Viaje;

class Ruta extends Model
{
    public function ciudadOrigen(){
    	return $this->belongsTo('App\Ciudad','ciudad_origen');
    }

    public function ciudadDestino(){
    	return $this->belongsTo('App\Ciudad','ciudad_destino');
    }

    public function claseTarifas(){
    	return $this->belongsToMany('App\Clasetarifa','preciorutas')->withTimestamps();
    }

    public function viajes(){
    	return $this->hasMany('App\Viaje','viajes');
    }

}
