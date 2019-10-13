<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AvionsRequest;
use App\Avion;
use App\Modelo;

class AvionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('modelosaviones');
    }

    public function getAviones(Request $request){
        $request->user()->Autorizado(['Administrador','Cliente'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $data = Avion::join('modelos','modelos.id','avions.modelo_id')
            ->select('avions.nombre as nombre','modelos.id as modelo_id','modelos.nombre as modelo')
            ->orderBy('modelo','asc')
            ->get();
            return response()->json($data,200);
        }

    }

    public function getCantAvion(Request $request)
    {
        $request->user()->Autorizado('Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
        
        if($request->ajax()){
            $cant = Avion::select('id')->get()->count();   
            return response()->json($cant,200);
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
    public function store(AvionsRequest $request)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $avion = Avion::where([['nombre',$request->avion],['modelo_id',$request->modelo]])->first();
            $modelo = Modelo::where('id',$request->modelo)->first();
            if($avion)
                return response()->json(['existente'],200);
            else{
                $navion = new Avion();
                $navion->nombre = $request->avion;
                $navion->modelo()->associate($modelo);
                $navion->save();
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
     public function update(AvionsRequest $request, Avion $avion){

     }
    public function update1(AvionsRequest $request, Avion $avion)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $test = Avion::where([['nombre',$request->avion],['modelo_id',$request->modelo]])->first();
            if($test && $test->id != $avion->id)
                return response()->json(['existente'],200);
            else{
                $avion->nombre = $request->avion;
                $avion->modelo_id = $request->modelo;
                $avion->save();
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
     public function destroy(Request $request,$nombre)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $avion = Avion::where('nombre',$nombre)->first();
            $avion->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
