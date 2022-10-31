<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class preinscripcionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create(['name' =>'', 'idPreinscripciones' => 1]);
        $this->call(preinscripcionesTableSeeder::class);
    }
}
