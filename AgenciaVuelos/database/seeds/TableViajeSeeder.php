<?php

use Illuminate\Database\Seeder;
use App\Avion;
use App\Ruta;
use App\Viaje;
class TableViajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $avion1 = Avion::where('nombre','AV747000')->first();
        $ruta1 = Ruta::where('id','1')->first();


        $viaje = new Viaje();
        $viaje->fecha = '18/10/2019';
        $viaje->hora = '23:45';
        $viaje->avion()->associate($avion1);
        $viaje->ruta()->associate($ruta1);
        $viaje->save();

        $avion1 = Avion::where('nombre','AV757000')->first();
        $ruta1 = Ruta::where('id','2')->first();


        $viaje = new Viaje();
        $viaje->fecha = '20/10/2019';
        $viaje->hora = '20:45';
        $viaje->avion()->associate($avion1);
        $viaje->ruta()->associate($ruta1);
        $viaje->save();
    }
}
