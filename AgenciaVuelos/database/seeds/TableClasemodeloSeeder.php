<?php

use Illuminate\Database\Seeder;
use App\Clase;
use App\Modelo;
use App\Clasemodelo;


class TableClasemodeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clase = Clase::where('nombre','Ejecutiva')->first();
        $clase1 = Clase::where('nombre','Economica')->first();
        $modelo = Modelo::where('nombre','Boeing 747')->first();

        $clase->modelos()->attach($modelo);
        $clase1->modelos()->attach($modelo);

        $claseModelo = Clasemodelo::where([['clase_id',$clase->id],['modelo_id',$modelo->id]])->first();
        $claseModelo->capacidad = 100;
        $claseModelo->save();

        $claseModelo = Clasemodelo::where([['clase_id',$clase1->id],['modelo_id',$modelo->id]])->first();
        $claseModelo->capacidad = 200;
        $claseModelo->save();


    }
}
