<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RutaRequest;
use App\Ruta;
use App\Ciudad;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('rutas');
    }

    public function getRutas(Request $request){
        if($request->ajax()){
            $data = Ruta::join('ciudads as co','co.id','rutas.ciudad_origen')
            ->join('ciudads as cd','cd.id','rutas.ciudad_destino')
            ->select('rutas.id as id','co.nombre as ciudad_origen','cd.nombre as ciudad_destino')
            ->orderBy('ciudad_origen','asc')
            ->orderBy('ciudad_destino','asc')
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
    public function store(RutaRequest $request)
    {
        if($request->ajax()){
            $ciudad_origen = Ciudad::where('nombre',$request->ciudad_origen)->first();
            $ciudad_destino = Ciudad::where('nombre',$request->ciudad_destino)->first();
            $ruta = Ruta::where([['ciudad_origen',$ciudad_origen->id],['ciudad_destino',$ciudad_destino->id]])->first();
            if($ruta)
                return response()->json(['existente'],200);
            if($ciudad_origen->id == $ciudad_destino->id)
                return response()->json(['iguales'],200);
            else{
                $nruta = new Ruta();
                $nruta->ciudadOrigen()->associate($ciudad_origen);
                $nruta->ciudadDestino()->associate($ciudad_destino);
                $nruta->save();
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
    public function update1(RutaRequest $request, Ruta $ruta)
    {
        if($request->ajax()){
            $ciudad_origen = Ciudad::where('nombre',$request->ciudad_origen)->first();
            $ciudad_destino = Ciudad::where('nombre',$request->ciudad_destino)->first();
            $test = Ruta::where([['ciudad_origen',$ciudad_origen->id],['ciudad_destino',$ciudad_destino->id]])->first();
            if($test && $test->id != $ruta->id)
                return response()->json(['existente'],200);
            if($ciudad_origen->id == $ciudad_destino->id)
                return response()->json(['iguales'],200);
            else{
                $ruta->ciudad_origen = $ciudad_origen->id;
                $ruta->ciudad_destino = $ciudad_destino->id;
                $ruta->save();
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
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $ruta = Ruta::where('id',$id)->first();
            $ruta->delete();
            return response()->json(['eliminado'],200);
        }
        
    }
}
