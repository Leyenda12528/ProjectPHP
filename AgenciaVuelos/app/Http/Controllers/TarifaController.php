<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarTarifaRequest;
use App\Tarifa;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request->ajax()){
             $tarifas = Tarifa::all(); 
            return response()->json($tarifas,200);
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
    public function store(GuardarTarifaRequest $request)
    {        

        if($request->ajax()){
            $tarifa = Tarifa::where('nombre',$request->tarifa)->first();
            if($tarifa){
                return response()->json(['existente'],200);
            }
            else{
                $ntarifa = new Tarifa();
                $ntarifa->nombre = $request->tarifa;
                $ntarifa->save();
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
    public function update(GuardarTarifaRequest $request, Tarifa $tarifa)
    {
        
    }

    public function update1(GuardarTarifaRequest $request, Tarifa $tarifa)
    {
        
        if($request->ajax()){
            $test = Tarifa::where('nombre',$request->tarifa)->first();
            if($test && $test->nombre != $tarifa->nombre)
                return response()->json(['existente'],200);
            else{
                $tarifa->nombre = $request->tarifa;
                $tarifa->save(); 
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
    public function destroy(Request $request, Tarifa $tarifa)
    {
        if($request->ajax()){
            $tarifa->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
