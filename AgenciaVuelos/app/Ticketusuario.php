<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Compra;

class Ticketusuario extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function compras(){
    	return $this->hasMany('App\Compra');
    }


}
