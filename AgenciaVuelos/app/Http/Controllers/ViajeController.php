<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ViajeRequest;
use App\Viaje;
use App\Avion;
use App\Ruta;
use App\Ciudad;
use App\Clasetarifa;
use App\Clase;
use App\Tarifa;


class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       return view('programarViajes');
    }

    public function getViajes(Request $request){
        if($request->ajax()){
            $data = Viaje::join('rutas','rutas.id','viajes.ruta_id')
            ->join('ciudads as co','co.id','rutas.ciudad_origen')
            ->join('ciudads as cd','cd.id','rutas.ciudad_destino')
            ->join('avions','avions.id','viajes.avion_id')
            ->select('viajes.id as viaje_id','viajes.ruta_id as ruta_id','co.nombre as ciudad_origen','cd.nombre as ciudad_destino','viajes.avion_id as avion_id','avions.nombre as avion','viajes.fecha as fecha','viajes.hora as hora')
            ->orderBy('fecha','asc')
            ->get();
            return response()->json($data,200);
        }

    }

    public function getAviones(Request $request){
        if($request->ajax()){
            $aviones_disponibles =[];
            $aviones = Avion::orderBy('nombre','asc')->get();
            $aviones_ocupados = Viaje::where('fecha',$request->fecha)->get();
            if($request->avion){
                $navion = Avion::where('id',$request->avion)->first();
                $aviones_disponibles[] = $navion;
                $modelo = $navion->modelo_id;
            }//if avion
                foreach ($aviones as $avion) {
                    $i = false;
                    foreach ($aviones_ocupados as $avion_ocupado) {
                        if($avion->id == $avion_ocupado->avion_id)
                            $i = true;          
                    }//foreach aviones ocupados
                    if($request->avion){
                        if(!$i && $avion->modelo_id == $modelo)
                            $aviones_disponibles[]=$avion;
                    }
                    else{
                        if(!$i)
                            $aviones_disponibles[]=$avion;
                    }
                }//foreach aviones

            if($aviones_disponibles)
                return response()->json($aviones_disponibles,200);          
             else
                return response()->json($aviones,200);         
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViajeRequest $request)
    {
        if($request->ajax()){
            $viaje = Viaje::where([['fecha',$request->fecha],['avion_id',$request->avion]])->first();
            if($viaje)
                return response()->json(['existente'],200);
            else{
                $viaje = new Viaje();
                $viaje->fecha = $request->fecha;
                $viaje->hora = $request->hora;
                $viaje->ruta_id = $request->ruta;
                $viaje->avion_id = $request->avion;
                $viaje->save();
                return response()->json(['registrada'],200);
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update1(ViajeRequest $request,Viaje $viaje)
    {
        if($request->ajax()){
            $test = Viaje::where([['fecha',$request->fecha],['avion_id',$request->avion]])->first();
            if($test && $test->id != $viaje->id)
                return response()->json(['existente'],200);
            else{
                $viaje->fecha = $request->fecha;
                $viaje->hora = $request->hora;
                $viaje->avion_id = $request->avion;
                $viaje->save();
                return response()->json(['registrada'],200);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->ajax()){
            $viaje = Viaje::where('id',$id)->first();
            $viaje->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
