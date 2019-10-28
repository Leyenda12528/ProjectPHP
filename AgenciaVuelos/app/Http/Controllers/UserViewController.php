<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleUser;

class UserViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->Autorizado('Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');

        //$roles = RoleUser::where('role_id',$id)->get();        
        //$roles = RoleUser::select('user_id')->where('role_id',$id)->get();
        //$roles = $roles->toArray();
                
        return view('usuarios1');
    }
    public function getClientes(Request $request)
    {
        $request->user()->Autorizado('Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
        $id = 3; //Cliente
        $users = User::find(RoleUser::select('user_id')->where('role_id',$id)->get());
        //return $users;
        return response()->json($users,200);
    }
    public function deleteCliente(Request $request)
    {
        $request->user()->Autorizado('Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
        $user = User::where('id',$request->id)->first();
        $user->delete();
        return response()->json("OK",200);
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
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
