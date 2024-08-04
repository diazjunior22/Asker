<?php


namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'imagen' => $this->faker->imageUrl,
            'descripcion' => $this->faker->sentence,
            'precio' => $this->faker->numberBetween(100, 1000),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'id_categoria' => \App\Models\Categoria::factory(), // Asegúrate de tener un factory para Categoria
        ];
    }
}

