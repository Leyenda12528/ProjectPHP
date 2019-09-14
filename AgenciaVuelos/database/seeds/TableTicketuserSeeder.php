<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Ticketusuario;


class TableTicketuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$usuario = User::where('email','luiszapato@gmail.com')->first();
        $tu = new Ticketusuario();
        $tu->ticket= 'rtert4ef345';
        $tu->user()->associate($usuario);
        $tu->save();
    }
}
