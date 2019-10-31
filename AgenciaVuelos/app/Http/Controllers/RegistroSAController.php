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
        return view('Admins');
    }

    public function getAdmins(Request $request)
    {
        $request->user()->Autorizado('Super Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
        $users = User::find(RoleUser::select('user_id')->where('role_id',2)->get());
        return response()->json($users,200);
        
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
        //return $request->all();
        $request->user()->Autorizado('Super Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
        
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
        $exito = array(
            'ok' => 'Administrador ingresado !!!'
        );
        
        return response()->json($exito,200);
    }

    public function verificarPass(Request $request){
        $request->user()->Autorizado('Cliente',$request->user()->id,'No tiene permisos para acceder a este direccion');
        if (Hash::check($request->contra, $request->user()->password)) {
            $contra = array(
                'dato' => 1
            );
        } else {
            $contra = array(
                'dato' => 0
            );
        }
        return response()->json($contra,200);
    }
    public function ticket(Request $request){
        $request->user()->Autorizado('Cliente',$request->user()->id,'No tiene permisos para acceder a este direccion');
        $porciones = explode(" ", $request->pasajeros);
        $pasajeros = $porciones[0];
        $precioU = $request->Precio / $pasajeros;
        $dia = date("Y/m/d H:i:s");
        $ticket = array(
            'pasajeros' => $pasajeros,
            'Vuelo' => $request->NoVuelo,
            'fecha' => $request->fecha,
            'desde' => $request->desde,
            'hacia' => $request->hacia,
            'horaP' => $request->horaPartida,
            'claseT' => $request->claseTarifa,
            'precio' => $precioU,
            'total' => $request->Precio,
            'dia' => $dia
        );  
        //return response()->json($ticket,200);
        
        //return view('tools.ticket', compact('ticket'));

        $view =  \View::make('tools.ticket', compact('ticket'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view,'UTF-8');
        $pdf->setPaper([0, 0, 566.929, 425.197], 'landscape');
        return $pdf->stream();
    }
    public function byeAdmin(Request $request)
    {
        $request->user()->Autorizado('Super Administrador',$request->user()->id,'No tiene permisos para acceder a este direccion');
        $user = User::where('id',$request->id)->first();
        $user->delete();
        $rol= RoleUser::where('user_id',$request->id)->first();
        $rol->delete();
        return response()->json("OK",200);
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
