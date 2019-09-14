<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CTRequest;
use App\Clasetarifa;
use App\Clase;
use App\Tarifa;

class ClaseTarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('tarifasclases');
    }
    public function getClasetarifas(Request $request){
        if($request->ajax()){
            $data = Clasetarifa::join('clases','clases.id','clasetarifas.clase_id')
            ->join('tarifas','tarifas.id','clasetarifas.tarifa_id')
            ->select('clasetarifas.id as id','clases.nombre as clase','tarifas.nombre as tarifa')
            ->orderBy('clase','asc')
            ->orderBy('tarifa_id','asc')
            ->get();        
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
    public function store(CTRequest $request)
    {
        if($request->ajax()){
            $c = Clase::where('nombre',$request->clase)->first();
            $t = Tarifa::where('nombre',$request->tarifa)->first();
            $ct = CLasetarifa::where([['clase_id',$c->id],['tarifa_id',$t->id]])->first();
            if($ct)
                return response()->json(['existente'],200);
            else{
                $c->tarifas()->attach($t);
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

    public function update1(Request $request, Clasetarifa $clasetarifa)
    {
        if($request->ajax()){
            $c = Clase::where('nombre',$request->clase)->first();
            $t = Tarifa::where('nombre',$request->tarifa)->first();
            $ct = Clasetarifa::where([['clase_id',$c->id],['tarifa_id',$t->id]])->first();
            if($ct && $ct->id!= $clasetarifa->id)
                return response()->json(['existente'],200);
            else{
                $clasetarifa->clase_id = $c->id;
                $clasetarifa->tarifa_id = $t->id;
                $clasetarifa->save();
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
    public function destroy(Request $request, Clasetarifa $clasetarifa)
    {
        if($request->ajax()){
            $clasetarifa->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
