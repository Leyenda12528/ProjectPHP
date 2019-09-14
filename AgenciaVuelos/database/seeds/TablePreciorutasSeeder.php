<?php

use Illuminate\Database\Seeder;
use App\Ruta;
use App\Clasetarifa;
use App\Precioruta;


class TablePreciorutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $ruta = Ruta::where([['ciudad_origen','1'],['ciudad_destino','3']])->first();
       $claseTarifa = Clasetarifa::where([['clase_id','1'],['tarifa_id','1']])->first();
       $precio = 20;

       $ruta->claseTarifas()->attach($claseTarifa);

       $precioRuta = Precioruta::where([['ruta_id',$ruta->id],['clasetarifa_id',$claseTarifa->id]])->first();

       $precioRuta->precio=$precio;
       $precioRuta->save();

       $ruta = Ruta::where([['ciudad_origen','4'],['ciudad_destino','5']])->first();
       $claseTarifa = Clasetarifa::where([['clase_id','1'],['tarifa_id','1']])->first();
       $precio = 500;

       $ruta->claseTarifas()->attach($claseTarifa);

       $precioRuta = Precioruta::where([['ruta_id',$ruta->id],['clasetarifa_id',$claseTarifa->id]])->first();

       $precioRuta->precio=$precio;
       $precioRuta->save();





    }
}
