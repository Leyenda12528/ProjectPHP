<?php

use Illuminate\Database\Seeder;
use App\Avion;
use App\Modelo;

class TableAvionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Boeing747 = Modelo::where('nombre','Boeing 747')->first();
        $Boeing757 = Modelo::where('nombre','Boeing 757')->first();
        $Boeing777 = Modelo::where('nombre','Boeing 777')->first();

        $avion = new Avion();
        $avion->nombre = 'AV747000';
        $avion->modelo()->associate($Boeing747);
        $avion->save();

        $avion = new Avion();
        $avion->nombre = 'AV757000';
        $avion->modelo()->associate($Boeing757);
        $avion->save();
        

        $avion = new Avion();
        $avion->nombre = 'AV777000';
        $avion->modelo()->associate($Boeing777);
        $avion->save();
        

        // busines = avion y deler = modelo
    }
}
