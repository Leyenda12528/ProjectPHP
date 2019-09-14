<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Avion;
use App\Ruta;
use App\Clasetarifa;
use App\Clase;
use App\Compra;

class Viaje extends Model
{
    public function avion(){
    	return $this->belongsTo('App\Avion');
    }
    public function ruta(){
    	return $this->belongsTo('App\Ruta');
    }
    public function clasetarifas(){
    	return $this->belongsToMany('App\Clasetarifa','viajeprecios')->withTimestamps();
    }
    public function clases(){
    	return $this->belongsToMany('App\Clase','viajedisponibilidads')->withTimestamps();
    }
    public function compras(){
        return $this->hasMany('App\Compra');
    }
}
