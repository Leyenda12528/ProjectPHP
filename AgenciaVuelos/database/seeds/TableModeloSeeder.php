<?php

use Illuminate\Database\Seeder;
use App\Modelo;
use App\Clase;

class TableModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $claseEje = Clase::where('nombre','Ejecutiva')->first();
        $claseEco = Clase::where('nombre','Economica')->first();
        $modelo = new Modelo();
        $modelo->nombre = 'Boeing 747';
        $modelo->descripcion = 'Descripcion';
        $modelo->save();

        $modelo = new Modelo();
        $modelo->nombre = 'Boeing 757';
        $modelo->descripcion = 'Descripcion';
        $modelo->save();

        $modelo = new Modelo();
        $modelo->nombre = 'Boeing 777';
        $modelo->descripcion = 'Descripcion';
        $modelo->save();


    }
}
