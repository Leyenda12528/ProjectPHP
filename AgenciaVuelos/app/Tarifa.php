<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clase;
use App\Compra;

class Tarifa extends Model
{
	protected $guarded = ['id'];
	
    public function clases(){
    	return $this->belongsToMany('App\Clase','clasetarifas')->withTimestamps();
    }
    public function compras(){
    	return $this->hasMany('App\Compra');
    }

    public function getRouteKeyName()
	{
    	return 'nombre';
	}
}
