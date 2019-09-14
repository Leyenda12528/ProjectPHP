<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticketusuario;
use App\Viaje;
use App\Clase;
use App\Trifa;

class Compra extends Model
{
    public function ticket(){
    	return $this->belongsTo('App\Ticketusuario','ticket_id');
    }
    public function viaje(){
    	return $this->belongsTo('App\Viaje');
    }
    public function clase(){
    	return $this->belongsTo('App\Clase');
    }
    public function tarifa(){
    	return $this->belongsTo('App\Tarifa');
    }
}
