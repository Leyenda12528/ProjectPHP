<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarClaseRequest;
use App\Clase;

class ClaseController extends Controller
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
            $clases = Clase::orderBy('nombre','asc')->get();
            return response()->json($clases,200);
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
    public function store(GuardarClaseRequest $request)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $clase = Clase::where('nombre',$request->clase)->first();
            if($clase){
                return response()->json(['existente'],200);
            }
            else{
                $nclase = new Clase();
                $nclase->nombre = $request->clase;
                $nclase->save();
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
    public function update1(GuardarClaseRequest $request, Clase $clase)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $test = Clase::where('nombre',$request->clase)->first();
            if($test && $test->nombre != $clase->nombre)
                return response()->json(['existente'],200);
            else{
                $clase->nombre = $request->clase;
                $clase->save();
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
    public function destroy(Request $request,Clase $clase)
    {
        $request->user()->Autorizado(['Administrador'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        if($request->ajax()){
            $clase->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
