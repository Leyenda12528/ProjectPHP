<?php

use Illuminate\Database\Seeder;
use App\Clase;
use App\Tarifa;
use App\Viaje;
use App\Ticketusuario;
use App\Compra;
use App\Clasetarifa;
use App\Precioruta;


class TableCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket = Ticketusuario::where('id','1')->first();
        $viaje = Viaje::where('id','1')->first();
        $clase = Clase::where('id','1')->first();
        $tarifa = Tarifa::where('id','1')->first();
        $cantidad = 5;

        $clasetarifa = Clasetarifa::where([['clase_id',$clase->id],['tarifa_id',$tarifa->id]])->first()->id;
        $ruta = $viaje->ruta_id;

        $precio = Precioruta::where([['clasetarifa_id',$clasetarifa],['ruta_id',$ruta]])->first()->precio;
        $total = $precio * $cantidad;

        $compra = new Compra();
        $compra->cantidad = $cantidad;
        $compra->total = $total;
        $compra->ticket()->associate($ticket);
        $compra->viaje()->associate($viaje);
        $compra->clase()->associate($clase);
        $compra->tarifa()->associate($tarifa);
        $compra->save();


    }
}
