<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categorias;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria  = new Categorias();
        $categoria->nombreCategoria = "35+";
        $categoria->edadMinima = 35;
        $categoria->edadMaxima = 44;

        $categoria->save();
    }
}
