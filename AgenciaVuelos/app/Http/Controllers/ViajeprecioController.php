<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ViajeprecioRequest;
use App\Ruta;
use App\Avion;
use App\Clasemodelo;
use App\Clasetarifa;
use App\Clase;
use App\Tarifa;
use App\Viajeprecio;
use App\Viaje;
use App\Precioruta;

class ViajeprecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->Autorizado(['Administrador','Cliente'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $data = Viajeprecio::join('clasetarifas','clasetarifas.id','viajeprecios.clasetarifa_id')
            ->join('clases','clases.id','clasetarifas.clase_id')
            ->join('tarifas','tarifas.id','clasetarifas.tarifa_id')
            ->select('viajeprecios.id as id','clases.nombre as clase','tarifas.nombre as tarifa')
            ->get();
            return response()->json($data,200);
        }

        
    }
    public function getTarifas(Request $request)
    {
        $request->user()->Autorizado(['Administrador','Cliente'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $ruta = Ruta::where('id',$request->ruta)->first();
            $avion = Avion::where('id',$request->avion)->first();
            $modelo = $avion->modelo_id;
            $clasemodelos = Clasemodelo::where('modelo_id',$modelo)->get();
            $clases = [];
            foreach ($clasemodelos as $row) {
                $clases[] = $row->clase_id;
            }
            $clasetarifas = [];
            foreach ($clases as $row) {
                $clasetarifas[]= Clasetarifa::where('clase_id',$row)->get();
            }
            $clasetarifas_id = [];
             foreach ($clasetarifas as $row) {
                foreach ($row as $clasetarifa) {
                    $clasetarifas_id[] =$clasetarifa->id;
                }
             }
             $precioruta = [];
            foreach ($clasetarifas_id as $row) {
                $pr = Precioruta::where([['ruta_id',$ruta->id],['clasetarifa_id',$row]])->first(); 
                if($pr){
                    $precioruta[] = $pr;
                }
            }
            $clasetarifaReturn = [];
            foreach ($precioruta as $row) {
                $clasetarifaReturn[] = $row->clasetarifa_id;
            }
            $ct = Clasetarifa::join('clases','clases.id','clasetarifas.clase_id')
            ->join('tarifas','tarifas.id','clasetarifas.tarifa_id')
            ->select('clasetarifas.id as id','clases.nombre as clase','tarifas.nombre as tarifa')
            ->orderBy('clase_id','asc')
            ->get(); 
            $data = [];
            
            foreach ($ct as $row) {
                $f = false;
                foreach ($clasetarifaReturn as $row1) {
                    if($row->id == $row1){
                        $f = true;
                    }                
                }
                if($f)
                    $data[] =$row;
            }

            return response()->json($data,200);   

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
    public function store(ViajeprecioRequest $request)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $vp = Viajeprecio::where([['viaje_id',$request->vuelo],['clasetarifa_id',$request->clasetarifa]])->first();
            if($vp)
                return response()->json(['existente']);
            else{
                $vp = new Viajeprecio();
                $vp->viaje_id = $request->vuelo;
                $vp->clasetarifa_id = $request->clasetarifa;
                $vp->save();
                return response()->json(['registrada']);
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
    public function update(Request $request, $id)
    {
        //
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
            $vp = Viajeprecio::where('id',$id)->first();
            $vp->delete();
            return response()->json(['eliminado']);

        }
    }
}
