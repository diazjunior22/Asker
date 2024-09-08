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
            'capacidad' => 10,
            'estado' => 'Disponible',
            'imagen' => 'https://muma.co/wp-content/uploads/2023/07/MESA-CBP-CIRCULAR.png'
        ]);

        Mesa::create([
            'numero' => 2,
            'capacidad' => 10,
            'estado' => 'Disponible',
            'imagen' => 'https://muma.co/wp-content/uploads/2023/07/MESA-CBP-CIRCULAR.png'
        ]);

        Mesa::create([
            'numero' => 3,
            'capacidad' => 10,
            'estado' => 'Disponible',
            'imagen' => 'https://muma.co/wp-content/uploads/2023/07/MESA-CBP-CIRCULAR.png'
        ]);

        Mesa::create([
            'numero' => 4,
            'capacidad' => 10,
            'estado' => 'Disponible',
            'imagen' => 'https://muma.co/wp-content/uploads/2023/07/MESA-CBP-CIRCULAR.png'
        ]);

        Mesa::create([
            'numero' => 5,
            'capacidad' => 10,
            'estado' => 'Disponible',
            'imagen' => 'https://muma.co/wp-content/uploads/2023/07/MESA-CBP-CIRCULAR.png'
        ]);

        Mesa::create([
            'numero' => 6,
            'capacidad' => 10,
            'estado' => 'Disponible',
            'imagen' => 'https://muma.co/wp-content/uploads/2023/07/MESA-CBP-CIRCULAR.png'
        ]);
    }
    }

