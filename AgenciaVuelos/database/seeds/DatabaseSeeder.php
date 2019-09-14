<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TableUserSeeder::class);
        $this->call(TableTarifaSeeder::class);
        $this->call(TableClaseSeeder::class);
        $this->call(TableModeloSeeder::class);
        $this->call(TableAvionSeeder::class);
        $this->call(TableCiudadSeeder::class);
        $this->call(TableRutaSeeder::class);
        $this->call(TableClasemodeloSeeder::class);
        $this->call(TablePreciorutasSeeder::class);
        $this->call(TableViajeSeeder::class);
        $this->call(TableViajeprecioSeeder::class);
        $this->call(TableViajedisponibilidadSeeder::class);
        $this->call(TableTicketuserSeeder::class);
        $this->call(TableCompraSeeder::class);
    }
}
