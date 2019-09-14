<?php

use Illuminate\Database\Seeder;
use App\Clase;
use App\Tarifa;


class TableClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarifaEcono = Tarifa::where('nombre','Econo')->first();
        $tarifaFlexi = Tarifa::where('nombre','Flexi')->first();
        $tarifaPromoEjecutiva = Tarifa::where('nombre','Promo ejecutiva')->first();
        $tarifaEjecutiva = Tarifa::where('nombre','Ejecutiva')->first();


        $clase = new Clase();
        $clase->nombre = 'Economica';
        $clase->save();
        $clase->tarifas()->attach($tarifaEcono);
        $clase->tarifas()->attach($tarifaFlexi);
        $clase->tarifas()->attach($tarifaPromoEjecutiva);


        $clase = new Clase();
        $clase->nombre = 'Ejecutiva';
        $clase->save();
        $clase->tarifas()->attach($tarifaPromoEjecutiva);
        $clase->tarifas()->attach($tarifaEjecutiva);
    }
}
