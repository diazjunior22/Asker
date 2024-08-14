<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'perros',
        ]);

        Categoria::create([
            'nombre' => 'hamburguesas',
        ]);

        Categoria::create([
            'nombre' => 'pizza',
        ]);

        Categoria::create([
            'nombre' => 'bebidas',
        ]);
        Categoria::create([
            'nombre' => 'Asados',
        ]);
    }
}
