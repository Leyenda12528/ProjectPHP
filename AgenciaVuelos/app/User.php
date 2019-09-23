<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Ticketusuario;
use App\RoleUSer;
use App\Role;

class User extends Authenticatable
{
    
    public function tickets(){
        $this->hasMany('App\Ticketusuario');
    }
    //public function
    /*= [
        'options' => 'array',
    ];*/
    
    public function permiso($rol, $id, $mjs='No autorizado'){
        $rol_id_rol = Role::select('id')->where('rol',$rol)->first();
        $rol_id_roluser = RoleUser::select('role_id')->where('user_id',$id)->first();                
        if($rol_id_rol->id != $rol_id_roluser->role_id){
            return abort(403, $mjs);
        }
            return true;
    }

    public static function isAdmin($id){
        /*if($id != 1){
            abort(401,'No autorizado | no admin');
        }
            return true;*/
        
        if($id == 1)
            return true;
        else 
            return false;  
        //abort(401,'No autorizado');*/
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
