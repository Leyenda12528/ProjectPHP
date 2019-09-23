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
      
    public function Role($id){        
        $role_id = RoleUser::select('role_id')->where('user_id',$id)->first();        
        $name_rol = Role::find($role_id)->first();//select('rol')->where('id',$role_id)->get();
        return $name_rol->rol;
    }
    /*public function permiso($rola, $id, $mjs='No autorizado'){
        $rol_id_rol = Role::select('id')->where('rol',$rola)->first();
        $rol_id_roluser = RoleUser::select('role_id')->where('user_id',$id)->first();
        if($rol_id_rol->id != $rol_id_roluser->role_id){
            return abort(403, $mjs);
        }
            return true;
    }*/
    public function Autorizado($roles, $id, $mjs='No autorizado'){
        if($this->hasAnyRole($roles, $id)){
            return true;
        }
        abort(403, $mjs);
    }

    public function hasAnyRole($roles, $id){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role, $id)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles, $id)){
                return true;
            }
        }
    }
    public function hasRole($role, $id){
        $rol_id_rol = Role::select('id')->where('rol',$role)->first();
        $rol_id_roluser = RoleUser::select('role_id')->where('user_id',$id)->first();
        if($rol_id_rol->id == $rol_id_roluser->role_id){
            return true;
        }
        return false;
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
        'name', 'email', 'password', 'tarjeta',
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
