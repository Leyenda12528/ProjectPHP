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
use App\Clasemodelo;
use App\Precioruta;
use App\Viajeprecio;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
       return view('programarViajes');
    }
    #------------- Prar los REPORTES
    public function getReporte(Request $request){
        $request->user()->Autorizado(['Administrador','Super Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        $cantV = Viaje::select('id')->get()->count();   
        $cantA = Avion::select('id')->get()->count(); 
        $data = Viaje::join('rutas','rutas.id','viajes.ruta_id')
            ->join('ciudads as co','co.id','rutas.ciudad_origen')
            ->join('ciudads as cd','cd.id','rutas.ciudad_destino')
            ->join('avions','avions.id','viajes.avion_id')
            ->join('modelos','modelos.id','avions.modelo_id')
            ->select('viajes.id as viaje_id','viajes.ruta_id as ruta_id','co.nombre as ciudad_origen','cd.nombre as ciudad_destino','viajes.avion_id as avion_id','avions.nombre as avion','viajes.fecha as fecha','viajes.hora as hora','modelos.nombre as modelo')
            ->orderBy('fecha','asc')
            ->get();        
            
            //return view('tools.pdf', compact('cant'));
            $view =  \View::make('tools.pdf', compact('cantV','data','cantA'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view,'UTF-8')->setPaper('a4', 'landscape');
            return $pdf->stream();

    }    
    #----------------- fin de REPORTES

    public function getViajes(Request $request){
        $request->user()->Autorizado(['Administrador','Cliente'],$request->user()->id,'No tiene permisos para acceder a este direccion');
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
    public function getCantViajes(Request $request)
    {
        $request->user()->Autorizado('Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
        
        if($request->ajax()){
            $cant = Viaje::select('id')->get()->count();   
            return response()->json($cant,200);
        }
    }

    public function getAviones(Request $request){
        $request->user()->Autorizado(['Administrador','Cliente'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $aviones_disponibles =[];
            $clasemodelo;
            $aviones = Avion::orderBy('nombre','asc')->get();
            $aviones_ocupados = Viaje::where('fecha',$request->fecha)->get();
            if($request->avion){
                $navion = Avion::where('id',$request->avion)->first();
                $aviones_disponibles[] = $navion;
                $modelo = $navion->modelo_id;
                $clasemodelo = Clasemodelo::where('modelo_id',$modelo)->get();
            }//if avion
                foreach ($aviones as $avion) {
                    $i = false;
                    foreach ($aviones_ocupados as $avion_ocupado) {
                        if($avion->id == $avion_ocupado->avion_id)
                            $i = true;          
                    }//foreach aviones ocupados
                    if($request->avion){
                        if(!$i){
                            
                            $ct = Clasemodelo::where('modelo_id',$avion->modelo_id)->get();
                            foreach ($clasemodelo as $row) {
                                $flag = false;
                                foreach ($ct as $row1) {
                                    if($row->clase_id == $row1->clase_id && $row->capacidad <= $row1->capacidad)
                                        $flag = true;
                                    
                                }
                                if($flag == false)
                                    break;
                                $aviones_disponibles[]=$avion;
                            }

                            
                        }
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

    public function viajesDisponibles(Request $request){

        $ruta = $request->ruta;
        $fecha = $request->fecha;
        $pasajeros = $request->passengers;
        $clase = $request->baggage;

        $data['fecha'] = $fecha;
        $data['pasajeros'] = $pasajeros;


        $ruta1 = Ruta::join('ciudads as co','co.id','rutas.ciudad_origen')
            ->join('ciudads as cd','cd.id','rutas.ciudad_destino')
            ->select('rutas.id as id','co.nombre as ciudad_origen','cd.nombre as ciudad_destino')
            ->where('rutas.id',$ruta)
            ->first();

        $data['co'] = $ruta1->ciudad_origen;
        $data['cd'] = $ruta1->ciudad_destino;     

        $viajes = Viaje::where([['fecha',$request->fecha],['ruta_id',$ruta]])->get();

        $data['viajes'] = $viajes;
 

        $tarifasVuelos = [];
        $i = 0;
        

        foreach ($viajes as $viaje) {
            $tvs = Viajeprecio::join('clasetarifas','clasetarifas.id','viajeprecios.clasetarifa_id')
            ->join('clases','clases.id','clasetarifas.clase_id')
            ->join('tarifas','tarifas.id','clasetarifas.tarifa_id')
            ->select('viajeprecios.id as id','clases.nombre as clase','tarifas.nombre as tarifa','clasetarifas.id as ctId')
            ->where('viaje_id',$viaje->id)
            ->get();
            $j = 0;
            foreach ($tvs as $tv) {              
                $tarifasVuelos[$i][$j] = $tv;
                $j++;
            }
            $i++;
        }   

        $data['tarifas'] = $tarifasVuelos;

        $preciosTarifa = [];
        $indice = 0;
        $i = 0;


        foreach ($tarifasVuelos as $tvs) {
            $j = 0;
            foreach ($tvs as $tv) {
                 $pr = Precioruta::join('rutas','rutas.id','preciorutas.ruta_id')
                    ->join('clasetarifas','clasetarifas.id','preciorutas.clasetarifa_id')
                    ->join('clases','clases.id','clasetarifas.clase_id')
                    ->join('tarifas','tarifas.id','clasetarifas.tarifa_id')
                    ->where('preciorutas.ruta_id',$ruta)
                    ->where('preciorutas.clasetarifa_id',$tv->ctId)
                    ->select('preciorutas.id as precioruta_id','clasetarifas.id as clasetarifa_id','clases.nombre as clase','tarifas.nombre as tarifa','preciorutas.precio as precio')
                    ->first();

                        $preciosTarifa[$i][$j] = $pr;
                        $j++;
             
            }
            $i++;
        }

        $data['precios'] = $preciosTarifa;

        return view('viajesDisponibles',compact('data'));

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
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
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
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
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
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $viaje = Viaje::where('id',$id)->first();
            $viaje->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
