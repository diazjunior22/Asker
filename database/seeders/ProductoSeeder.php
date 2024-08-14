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
                 
        //?PERROS CALIENTES
            Producto::create([
                'nombre' => "Perro sencillo",
                'imagen' => "img/producto/perro5.jpg",
                'descripcion' => "perro con salchila larga, salsa de la casa, papita chongo y queso",
                'precio' => "6000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);

            Producto::create([
                'nombre' => "Perro Gemelo",
                'imagen' => "img/producto/perro1.jpg",
                'descripcion' => "Perro con doble salchiccha salsa de la casa acompañado de papas",
                'precio' => "8000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);
            Producto::create([
                'nombre' => "Perro Pitbul",
                'imagen' => "img/producto/perro4.jpg",
                'descripcion' => "Perro con doble salchiccha salsa de la casa acompañado de papas",
                'precio' => "9000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);
            Producto::create([
                'nombre' => "ChoryPerro",
                'imagen' => "img/producto/perro3.jpg",
                'descripcion' => "Perro con doble salchiccha salsa de la casa acompañado de papas",
                'precio' => "10000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);
            Producto::create([
                'nombre' => "Perro con perro",
                'imagen' => "img/producto/perro2.jpg",
                'descripcion' => "Dos perros ala plancha con salsa de la casa y pdoble papas",
                'precio' => "12000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);
            Producto::create([
                'nombre' => "Perro de raza",
                'imagen' => "img/producto/perro6.jpg",
                'descripcion' => "Perro con carne asada en su interior, salsas de la casa y y pan largo ",
                'precio' => "20000",
                'cantidad' => "0",
                'id_categoria' => 1, 
           
            ]);
            //?HAMBURGUESAS

            Producto::create([
                'nombre' => "Hamburguesa sencilla",
                'imagen' => "img/producto/hamburguesa.webp",
                'descripcion' => "hamburguesa carne,tomate,cebolla caramelizada,salsa de la casa y papas",
                'precio' => "150000",
                'cantidad' => "0",
                'id_categoria' => 2, 


            ]);


            Producto::create([
                'nombre' => "Hamburguesa doble carne",
                'imagen' => "img/producto/HAMBURGUESA1.jpeg",
                'descripcion' => "Doble carrne ,tomate,cebolla caramelizada,salsa de la casa y papas",
                'precio' => "20000",
                'cantidad' => "0",
                'id_categoria' => 2, 
                

            ]);
            Producto::create([
                'nombre' => "Hamburguesa Miami",
                'imagen' => "img/producto/HAMBURGUESA2.jpeg",
                'descripcion' => "carne asada,lechuga,tomate,cebolla caramelizada,salsa de la casa y papas ",
                'precio' => "18000",
                'cantidad' => "0",
                'id_categoria' => 2, 
                

            ]);
            Producto::create([
                'nombre' => "Hamburguesa de la casa",
                'imagen' => "img/producto/HAMBURGUESA3.jpeg",
                'descripcion' => "carne, tocineta,lechuga,tomate,cebolla caramelizada,salsa de la casa y papas ",
                'precio' => "20000",
                'cantidad' => "0",
                'id_categoria' => 2, 
                

            ]);
            Producto::create([
                'nombre' => "Hamburguesa con pollo",
                'imagen' => "img/producto/HAMBURGUESA4.jpeg",
                'descripcion' => "Pollo lechuga,tomate,cebolla caramelizada,salsa de la casa y papas ",
                'precio' => "20000",
                'cantidad' => "0",
                'id_categoria' => 2, 
                

            ]);
            Producto::create([
                'nombre' => "Hamburguesa tu y yo",
                'imagen' => "img/producto/HAMBURGUESA5.jpeg",
                'descripcion' => "Dos hamburguesas de carne,tomate,cebolla caramelizada,salsa de la casa y papas",
                'precio' => "35000",
                'cantidad' => "0",
                'id_categoria' => 2, 
                

            ]);
            //?ASADOS

             Producto::create([
                'nombre' => "Asado con carne",
                'imagen' => "img/producto/asado1.jpeg",
                'descripcion' => "Asado de carne con papa cocida o papas fritas, ensalada y salsas",
                'precio' => "150000",
                'cantidad' => "0",
                'id_categoria' => 3, 


            ]);


            Producto::create([
                'nombre' => "Pollo Asado",
                'imagen' => "img/producto/asado2.jpeg",
                'descripcion' => "1 Pollo entero asado con papas",
                'precio' => "19000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);
            Producto::create([
                'nombre' => "Picaña",
                'imagen' => "img/producto/asado3.jpeg",
                'descripcion' => "carne de alta calida finamente cortada y asada con vino blanco",
                'precio' => "25000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);
            Producto::create([
                'nombre' => "Chuleta",
                'imagen' => "img/producto/asado4.jpeg",
                'descripcion' => "Chuleta de cerdo con ensalada y papa cocida",
                'precio' => "18000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);
            Producto::create([
                'nombre' => "Sobre Barriga",
                'imagen' => "img/producto/asado5.jpeg",
                'descripcion' => "Sobre barriga con ensalada y papa cocida",
                'precio' => "18000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);
            Producto::create([
                'nombre' => "Pechuga a la plancha",
                'imagen' => "img/producto/asado6.jpeg",
                'descripcion' => "Pechuga de pollo asada con especies, ensalada y paap cocida",
                'precio' => "15000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);

            //?PIZZAS

            Producto::create([
                'nombre' => "Pizza con jamon y queso",
                'imagen' => "img/producto/pizza1.jpeg",
                'descripcion' => "Deliciosa Pizza con jamon y queso",
                'precio' => "15000",
                'cantidad' => "0",
                'id_categoria' => 3, 


            ]);


            Producto::create([
                'nombre' => "Pizza con bocadillo",
                'imagen' => "img/producto/pizza2.jpeg",
                'descripcion' => "pizza con base de bocadillo,queso y jamon",
                'precio' => "19000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);
            Producto::create([
                'nombre' => "Pizza de pollo y champiñones",
                'imagen' => "img/producto/pizza4.jpeg",
                'descripcion' => "pizza con trozos de pollo y champiñones",
                'precio' => "19000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);
            Producto::create([
                'nombre' => "Pizza de peperoni",
                'imagen' => "img/producto/pizza3.jpeg",
                'descripcion' => "Pizza con rebanadas de peperoni",
                'precio' => "18000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);
            Producto::create([
                'nombre' => "Pizza tropical",
                'imagen' => "img/producto/piña.jpeg",
                'descripcion' => "Pizza con queso ,salami y piña",
                'precio' => "18000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);
            Producto::create([
                'nombre' => "Pizza 4 carnes",
                'imagen' => "img/producto/4carnes.jpeg",
                'descripcion' => "Pizza con carne,pollo,chorizo y butifarra",
                'precio' => "20000",
                'cantidad' => "0",
                'id_categoria' => 3, 
                

            ]);

















        }
    }