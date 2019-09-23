<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CMRequest;
use App\Clase;
use App\Modelo;
use App\Clasemodelo;

class ClaseModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function relaciones(Request $request){
        $request->user()->Autorizado(['Administrador','Cliente'],$request->user()->id,'No tiene permisos para acceder a este direccion');
     if($request->ajax()){
            $cm = Clasemodelo::join('clases','clases.id','clasemodelos.clase_id')
            ->join('modelos','modelos.id','clasemodelos.modelo_id')
            ->select('clasemodelos.id as id','clases.nombre as clase','clasemodelos.capacidad as capacidad')
            ->where('modelos.nombre',$request->modelo)
            ->orderBy('clase_id','asc')
            ->get();
            return response()->json($cm,200);
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
    public function store(CMRequest $request)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $clase = Clase::where('nombre',$request->clase)->first();
            $modelo = Modelo::where('nombre',$request->modelo)->first();
            $capacidad = $request->capacidad;
            $cm = Clasemodelo::where([['clase_id',$clase->id],['modelo_id',$modelo->id]])->first();
            if($cm)
                return response()->json(['existente'],200);
            else{
                $clase->modelos()->attach($modelo);
                $cm = Clasemodelo::where([['clase_id',$clase->id],['modelo_id',$modelo->id]])->first();
                $cm->capacidad = $capacidad;
                $cm->save();
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
    public function update1(CMRequest $request, Clasemodelo $clasemodelo)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $clase = Clase::where('nombre',$request->clase)->first();
            $modelo = Modelo::where('nombre',$request->modelo)->first();
            $capacidad = $request->capacidad;
            $test = Clasemodelo::where([['clase_id',$clase->id],['modelo_id',$modelo->id]])->first();
            if($test && $test->id != $clasemodelo->id)
                return response()->json(['existente'],200);
            else{
                $clasemodelo->clase_id = $clase->id;
                $clasemodelo->modelo_id = $modelo->id;
                $clasemodelo->capacidad = $capacidad;
                $clasemodelo->save();
                return response()->json(['registrada'],200);
            }
            return response()->json($clasemodelo,200);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Clasemodelo $clasemodelo)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $clasemodelo->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
