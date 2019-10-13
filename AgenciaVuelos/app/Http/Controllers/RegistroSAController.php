<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\RoleUser;

class RegistroSAController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tarjeta' => ['required', 'string', 'max:25'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
        {
            $request->user()->Autorizado('Super Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
            $users = User::find(RoleUser::select('user_id')->where('role_id',2)->get());
            return view('Admins', compact('users'));
        }

        public function indexHome(Request $request)
    {
        $request->user()->Autorizado('Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
        
        if($request->ajax()){
            $cant = User::find(RoleUser::select('user_id')->where('role_id',3)->get())->count();   
            return response()->json($cant,200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  //      $datos = array($request);
//        $this->validator($datos);
        //return 'que hay de nuevo XD'.$request['name'];

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'tarjeta' => 0001,
        ]);
        $id_user = User::select('id')->where('email',$request['email'])->first();
        $modelo = new RoleUser();
        $modelo->user_id = $id_user->id;
        $modelo->role_id = 2;           //2-Admin
        $modelo->save();
        $exito = 'Administrador ingresado !!!';

        $users = User::find(RoleUser::select('user_id')->where('role_id',2)->get());
        return view('Admins', compact('users','exito'));
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
