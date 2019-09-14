<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PreciorutaRequest;
use App\Precioruta;
use App\Ruta;
use App\Clasetarifa;
use App\Ciudad;
use App\Clase;
use App\Tarifa;

class PreciorutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function precios(Request $request){
        if($request->ajax()){
            $data = Precioruta::join('rutas','rutas.id','preciorutas.ruta_id')
            ->join('clasetarifas','clasetarifas.id','preciorutas.clasetarifa_id')
            ->join('ciudads as co','co.id','rutas.ciudad_origen')
            ->join('ciudads as cd','cd.id','rutas.ciudad_destino')
            ->join('clases','clases.id','clasetarifas.clase_id')
            ->join('tarifas','tarifas.id','clasetarifas.tarifa_id')
            ->where('preciorutas.ruta_id',$request->ruta)
            ->select('preciorutas.id as precioruta_id','clasetarifas.id as clasetarifa_id','co.nombre as ciudadO','cd.nombre as ciudadD','clases.nombre as clase','tarifas.nombre as tarifa','preciorutas.precio as precio')
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
    public function store(PreciorutaRequest $request)
    {
        if($request->ajax()){
            $ruta = Ruta::where('id',$request->ruta)->first();
            $clasetarifa = Clasetarifa::where('id',$request->clasetarifa)->first();
            $precio = $request->precio;
            $precioruta = Precioruta::where([['ruta_id',$ruta->id],['clasetarifa_id',$clasetarifa->id]])->first();
            if($precioruta)
                return response()->json(['existente'],200);
            else{
                $ruta->claseTarifas()->attach($clasetarifa);
                $precioruta = Precioruta::where([['ruta_id',$ruta->id],['clasetarifa_id',$clasetarifa->id]])->first();
                $precioruta->precio = $precio;
                $precioruta->save();
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
    public function update1(PreciorutaRequest $request, Precioruta $precioruta)
    {
        if($request->ajax()){
            $ruta = Ruta::where('id',$request->ruta)->first();
            $clasetarifa = Clasetarifa::where('id',$request->clasetarifa)->first();
            $precio = $request->precio;
            $test = Precioruta::where([['ruta_id',$ruta->id],['clasetarifa_id',$clasetarifa->id]])->first();
            if($test && $test->id != $precioruta->id)
                return response()->json(['existente'],200);
            else{
                $precioruta->ruta_id = $request->ruta;
                $precioruta->clasetarifa_id = $request->clasetarifa;
                $precioruta->precio = $precio;
                $precioruta->save();
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
           $pr = Precioruta::where('id',$id)->first();
           $pr->delete();
           return response()->json(['eliminada'],200); 
        }
        
    }
}


