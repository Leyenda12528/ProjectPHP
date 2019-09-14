<?php

use Illuminate\Database\Seeder;
use App\Viaje;
use App\Clasetarifa;
class TableViajeprecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viaje = Viaje::where('id','1')->first();
        $econoEcono = Clasetarifa::where('id','1')->first();
        $ejecuEjecu = Clasetarifa::where('id','5')->first();

        $viaje->clasetarifas()->attach($econoEcono);
        $viaje->clasetarifas()->attach($ejecuEjecu);


    }
}
