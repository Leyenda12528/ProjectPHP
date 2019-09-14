<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modelo;
use App\Viaje;

class Avion extends Model
{
    public function modelo(){
    	return $this->belongsTo('App\Modelo');
    }
    public function viajes(){
    	return $this->hasMany('App\Viaje','viajes');
    }

    public function getRouteKeyName()
    {
        return 'nombre';
    }
}
