<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Http\Requests\CiudadRequest;
use App\User;

class CiudadController extends Controller
{

    public function __construct()
    {/*
        $this->middleware(function( $request, $next){
            if(!User::isAdmin($request->user()->id)){
                abort(403,'no admin');
            }
            //$request->user()->permiso('Administrador',$request->user()->id,'No Auth');
            return $next($request);
        });
        */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->permiso1('Administrador');
        $request->user()->permiso('Administrador',$request->user()->id,'No Auth');
        //return 'bien hecho';
               
        
        /*$datos1 = $request->user();
        $datos1 = array($datos1);
        $row1 = array(
            'role'=> 'admin'
        );
        $datos = array_merge($datos1,$row1);*/


        //$datos = array($datos1,$row1);
//        array_push();

        //$datos = array_add($datos1,'role','admin');
        //$datos = array($datos1);
        /*foreach($datos1 as $item){
            //$item->put('role','admin');
            break;
        }*/
        //return $request->user();

        if($request->ajax()){
            $ciudades = Ciudad::orderBy('nombre','asc')->get();
            return response()->json($ciudades,200);
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
    public function store(CiudadRequest $request)
    {
        if($request->ajax()){
            $ciudad = Ciudad::where('nombre',$request->ciudad)->first();
            if($ciudad){
                return response()->json(['existente'],200);
            }
            else{
                $nciudad = new Ciudad();
                $nciudad->nombre = $request->ciudad;
                $nciudad->save();
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
    public function update1(CiudadRequest $request, Ciudad $ciudad)
    {
        if($request->ajax()){
            $test = Ciudad::where('nombre',$request->ciudad)->first();
            if($test && $test->nombre != $ciudad->nombre)
                return response()->json(['existente'],200);
            else{
                $ciudad->nombre = $request->ciudad;
                $ciudad->save();
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
    public function destroy(Request $request, $nombre)
    {
        if($request->ajax()){
            $ciudad = Ciudad::where('nombre',$nombre)->first();
            $ciudad->delete();
            return response()->json(['eliminado'],200);
        }
    }
}
