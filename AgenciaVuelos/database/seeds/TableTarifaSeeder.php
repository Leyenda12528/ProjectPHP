<?php

use Illuminate\Database\Seeder;
use App\Tarifa;

class TableTarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarifa = new Tarifa();
        $tarifa->nombre = 'Econo';
        $tarifa->save();

        $tarifa = new Tarifa();
        $tarifa->nombre = 'Flexi';
        $tarifa->save();

        $tarifa = new Tarifa();
        $tarifa->nombre = 'Promo ejecutiva';
        $tarifa->save();

        $tarifa = new Tarifa();
        $tarifa->nombre = 'Ejecutiva';
        $tarifa->save();
    }
}
