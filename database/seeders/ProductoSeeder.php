<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        // Crear 5 productos de ejemplo
        // Producto::factory()->count(10)->create();
     
            Producto::create([
                'nombre' => "Perro Hot",
                'imagen' => "img/producto/perro.jpg",
                'descripcion' => "hola",
                'precio' => "6000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);






        }
    }