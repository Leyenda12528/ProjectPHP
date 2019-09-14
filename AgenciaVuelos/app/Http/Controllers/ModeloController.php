<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuardarModeloRequest;
use App\Modelo;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $modelos = Modelo::orderBy('nombre','asc')->get();
            return response()->json($modelos,200);
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
    public function store(GuardarModeloRequest $request)
    {
        if($request->ajax()){
            $modelo = Modelo::where('nombre',$request->modelo)->first();
            if($modelo){
                return response()->json(['existente'],200);
            }
            else{
                $nmodelo = new Modelo();
                $nmodelo->nombre = $request->modelo;
                $nmodelo->descripcion = $request->descripcion;
                $nmodelo->save();
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
    public function update(Request $request, $id)
    {
        //
    }
    public function update1(GuardarModeloRequest $request, Modelo $modelo)
    {
        if($request->ajax()){
            $test = Modelo::where('nombre',$request->modelo)->first();
            if($test && $test->nombre != $modelo->nombre)
                return response()->json(['existente'],200);
            else{
                $modelo->nombre = $request->modelo;
                $modelo->descripcion = $request->descripcion;
                $modelo->save();
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
    public function destroy(Request $request,Modelo $modelo)
    {
        if($request->ajax()){
            $modelo->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
