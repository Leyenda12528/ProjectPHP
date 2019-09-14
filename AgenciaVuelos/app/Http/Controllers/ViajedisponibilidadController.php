<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruta;
use App\Viaje;
use App\Avion;
use App\Clase;
use App\Clasemodelo;
use App\Viajedisponibilidad;

class ViajedisponibilidadController extends Controller
{
    public function getDisponibilidad(Request $request){
        if($request->ajax()){
            $data = Viajedisponibilidad::join('clases','clases.id','viajedisponibilidads.clase_id')
            ->select('clases.nombre as clase','viajedisponibilidads.disponibilidad as disponibilidad')
            ->where('viajedisponibilidads.viaje_id',$request->vuelo)
            ->orderBy('clase_id','asc')
            ->get();
            return response()->json($data,200);
        }
    }
    public function setDisponibilidad(Request $request){
        if($request->ajax()){
            $viaje = Viaje::where([['fecha',$request->fecha],['hora',$request->hora],['ruta_id',$request->ruta],['avion_id',$request->avion]])->first();
            $viaje = $viaje->id;
            $avion = Avion::where('id',$request->avion)->first();
            $modelo = $avion->modelo_id;
            $clasemodelos = Clasemodelo::where('modelo_id',$modelo)->get();
            foreach ($clasemodelos as $row) {
                $vd = new Viajedisponibilidad();
                $vd->viaje_id = $viaje;
                $vd->clase_id = $row->clase_id;
                $vd->disponibilidad = $row->capacidad;
                $vd->save();
            }
            return response()->json('registrado',200);

        }

    }
}


