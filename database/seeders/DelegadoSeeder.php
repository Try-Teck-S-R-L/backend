<?php

namespace Database\Seeders;
use App\Models\delegados;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DelegadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $delegado = new delegados();
        $delegado->nombreDelegado = "Juan";
        $delegado->apellidoDelegado = "Lopez";
        $delegado->correoDelegado= "juanlopez@gmail.com";
        $delegado->contraseniaDelegado = "123456789";
        $delegado->nacionalidadDelegado = "Bolivia";
        $delegado->edadDelegado=32;
        $delegado->save();
    }
}
