<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mesa;


class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mesa::create([
            'numero' => 1,
            'capacidad' => 4,
            'estado' => 'Disponible',
            'imagen' => 'https://example.com/mesa1.jpg'
        ]);

        Mesa::create([
            'numero' => 2,
            'capacidad' => 6,
            'estado' => 'Ocupada',
            'imagen' => 'https://example.com/mesa2.jpg'
        ]);

        Mesa::create([
            'numero' => 3,
            'capacidad' => 8,
            'estado' => 'Disponible',
            'imagen' => 'https://example.com/mesa3.jpg'
        ]);

        Mesa::create([
            'numero' => 4,
            'capacidad' => 2,
            'estado' => 'Ocupada',
            'imagen' => 'https://example.com/mesa4.jpg'
        ]);

        Mesa::create([
            'numero' => 5,
            'capacidad' => 10,
            'estado' => 'Disponible',
            'imagen' => 'https://muma.co/wp-content/uploads/2023/07/MESA-CBP-CIRCULAR.png'
        ]);
    }
    }

