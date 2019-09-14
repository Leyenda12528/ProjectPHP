<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ruta;

class Ciudad extends Model
{
    public function rutas(){
    	return $this->hasMany('App\Ruta')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'nombre';
    }
}
