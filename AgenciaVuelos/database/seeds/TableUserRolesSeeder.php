<?php

use Illuminate\Database\Seeder;
use App\User;
use App\RoleUser;
use App\Role;

class TableUserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CREANDO ROLES
        $roles = new Role();
        $roles->rol = 'Super Administrador';
        $roles->save();

        $roles = new Role();
        $roles->rol = 'Administrador';
        $roles->save();

        $roles = new Role();
        $roles->rol = 'Cliente';
        $roles->save();

        /// CREANO USUARIOS
        $usuarios = new User();
        $usuarios->name = 'Super Admin';
        $usuarios->email = 'sa@gmail.com';        
        $usuarios->password = Hash::make('12345678');
        $usuarios->tarjeta = 1;
        $usuarios->save();

        $usuarios = new User();
        $usuarios->name = 'Admin';
        $usuarios->email = 'admin@gmail.com';        
        $usuarios->password = Hash::make('12345678');
        $usuarios->tarjeta = 1;
        $usuarios->save();

        $usuarios = new User();
        $usuarios->name = 'Cliente';
        $usuarios->email = 'cliente@gmail.com';        
        $usuarios->password = Hash::make('12345678');
        $usuarios->tarjeta = 1;
        $usuarios->save();

        // CREANDO RELACION
        $id_user = User::select('id')->where('email','sa@gmail.com')->first();        
        $rol_user = new RoleUser();
        $rol_user->user_id = $id_user->id;
        $rol_user->role_id = 1;
        $rol_user->save();

        $id_user = User::select('id')->where('email','admin@gmail.com')->first();        
        $rol_user = new RoleUser();
        $rol_user->user_id = $id_user->id;
        $rol_user->role_id = 2;
        $rol_user->save();

        $id_user = User::select('id')->where('email','cliente@gmail.com')->first();        
        $rol_user = new RoleUser();
        $rol_user->user_id = $id_user->id;
        $rol_user->role_id = 3;
        $rol_user->save();
    }
}
