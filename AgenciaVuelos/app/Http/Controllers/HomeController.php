<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$request->user()->Autorizado(['Administrador','Cliente'],$request->user()->id,'No tiene permisos para acceder a este direccion');
        $id_rol = RoleUser::select('role_id')->where('user_id',$request->user()->id)->first();        
        if($id_rol->role_id == 2){   //Si es admin podra ir al home 
            return view('home');     //Mantenimiento del sistema 
        }
        else if($id_rol->id == 1){
            return view('Admins');   //Ingresar Administradores
        }
        return view('welcome');
    }
}
