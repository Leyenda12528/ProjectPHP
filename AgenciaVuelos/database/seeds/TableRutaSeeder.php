<?php

use Illuminate\Database\Seeder;
use App\Ruta;
use App\Ciudad;

class TableRutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Ss = Ciudad::where('nombre','San Salvador')->first();
        $Sj = Ciudad::where('nombre','San Jose')->first();
        $T = Ciudad::where('nombre','Tegucigalpa')->first();
        $P = Ciudad::where('nombre','Panama')->first();
        $M = Ciudad::where('nombre','Managua')->first();

        $ruta = new Ruta();
        $ruta->ciudadOrigen()->associate($Ss);
        $ruta->ciudadDestino()->associate($M);
        $ruta->save();

        $ruta = new Ruta();
        $ruta->ciudadOrigen()->associate($T);
        $ruta->ciudadDestino()->associate($P);
        $ruta->save();

        $ruta = new Ruta();
        $ruta->ciudadOrigen()->associate($M);
        $ruta->ciudadDestino()->associate($T);
        $ruta->save();
    }
}
