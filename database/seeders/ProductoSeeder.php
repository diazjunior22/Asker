<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        // Crear 5 productos de ejemplo
        Producto::factory()->count(10)->create();

    }


}
