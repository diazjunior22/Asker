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
                 
        //?Perros calientes
            Producto::create([
                'nombre' => "Perro Hot",
                'imagen' => "img/producto/perro.jpg",
                'descripcion' => "hola",
                'precio' => "6000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);

            Producto::create([
                'nombre' => "Perro Hot",
                'imagen' => "img/producto/perro2.webp",
                'descripcion' => "Producto con pan salchicha cebolla, tomate",
                'precio' => "6000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);
//?Hamburguesas

Producto::create([
    'nombre' => "Perro Hot",
    'imagen' => "img/producto/hamburguesa.webp",
    'descripcion' => "carne , suero, tuya",
    'precio' => "6000",
    'cantidad' => "0",
    'id_categoria' => 2, 

]);






        }
    }