<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tarifa;
use App\Modelo;
use App\Viaje;
use App\Compra;

class Clase extends Model
{
    protected $guarded = ['id'];

    public function tarifas(){
    	return $this->belongsToMany('App\Tarifa','clasetarifas')->withTimestamps();
    }
    public function modelos(){
    	return $this->belongsToMany('App\Modelo','clasemodelos')->withTimestamps();
    }
    public function viajes(){
    	return $this->belongsToMany('App\Viaje','viajedisponibilidads')->withTimestamps();
    }
    public function compras(){
    	return $this->hasMany('App\Compra');
    }

    public function getRouteKeyName()
    {
        return 'nombre';
    }
}
