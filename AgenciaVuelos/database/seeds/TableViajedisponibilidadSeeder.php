<?php

use Illuminate\Database\Seeder;
use App\Viaje;
use App\Clase;
use App\Viajedisponibilidad;
use App\Avion;
use App\Modelo;

class TableViajedisponibilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viaje = Viaje::where('id','1')->first();
        $avion= Avion::where('id',$viaje->avion_id)->first();
        $clase = Clase::where('id','1')->first();
        $clase1 = Clase::where('id','2')->first();

        $viaje->clases()->attach($clase);
        $viaje->clases()->attach($clase1);

        $capacidad = Viaje::join('avions','avions.id','viajes.id')
        ->join('modelos','modelos.id','avions.modelo_id')
        ->join('clasemodelos','clasemodelos.modelo_id','modelos.id')
        ->join('clases','clases.id','clasemodelos.clase_id')
        ->where('clasemodelos.clase_id',$clase->id)
        ->where('clasemodelos.modelo_id',$avion->modelo_id)     
        ->select('clasemodelos.capacidad as capacidad')
        ->get();



        $viajedispo =Viajedisponibilidad::where([['viaje_id',$viaje->id],['clase_id',$clase->id]])->first();
        $viajedispo->disponibilidad = $capacidad[0]->capacidad;
        $viajedispo->save();


        $capacidad = Viaje::join('avions','avions.id','viajes.id')
        ->join('modelos','modelos.id','avions.modelo_id')
        ->join('clasemodelos','clasemodelos.modelo_id','modelos.id')
        ->join('clases','clases.id','clasemodelos.clase_id')
        ->where('clasemodelos.clase_id',$clase1->id)
        ->where('clasemodelos.modelo_id',$avion->modelo_id)     
        ->select('clasemodelos.capacidad as capacidad')
        ->get();



        $viajedispo =Viajedisponibilidad::where([['viaje_id',$viaje->id],['clase_id',$clase1->id]])->first();
        $viajedispo->disponibilidad = $capacidad[0]->capacidad;
        $viajedispo->save();

    }
}
