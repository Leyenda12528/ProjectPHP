<?php

use Illuminate\Database\Seeder;
use App\Ciudad;

class TableCiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudad = new Ciudad();
        $ciudad->nombre = 'San Salvador';
        $ciudad->save();

        $ciudad = new Ciudad();
        $ciudad->nombre = 'San Jose';
        $ciudad->save();

        $ciudad = new Ciudad();
        $ciudad->nombre = 'Managua';
        $ciudad->save();

        $ciudad = new Ciudad();
        $ciudad->nombre = 'Tegucigalpa';
        $ciudad->save();

        $ciudad = new Ciudad();
        $ciudad->nombre = 'Panama';
        $ciudad->save();
    }
}
