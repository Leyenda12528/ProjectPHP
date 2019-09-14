<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Avion;
use App\Clase;

class Modelo extends Model
{
    public function aviones(){
    	return $this->hasMany('App\Avion');
    }
    public function clases(){
    	return $this->belongsToMany('App\Clase','clasemodelos')->withTimestamps();
    }
        public function getRouteKeyName()
    {
        return 'nombre';
    }
}
