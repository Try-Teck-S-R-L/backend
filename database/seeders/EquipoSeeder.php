<?php

namespace Database\Seeders;

use App\Models\equipos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipo = new equipos();
        $equipo->nombreEquipo= "Los pumas";
        $equipo->paisEquipo = "Bolivia";
        $equipo->logoEquipo = "null";
        $equipo->colorCamisetaPrincipal = "azul";
        $equipo->colorCamisetaSecundario = "blanco";
        $equipo->idDelegado = 1;
        $equipo->idCategoria = 1;
        $equipo->idPreinscripcion= 2;
        $equipo->save();
    }
}
