<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mesa;

use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Junior',
            'email' => 'diazjunior354@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('diazjunior22'),
            // Agrega cualquier otro campo requerido por tu tabla de usuarios
        ]);
        User::create([
            'name' => 'henry',
            'email' =>  "henry@gmail.com",
            'role' => 'user',
            'password' => Hash::make('diazjunior22'),
            // Agrega cualquier otro campo requerido por tu tabla de usuarios
        ]);
        User::create([
            'name' => 'james',
            'email' =>  "james@gmail.com",
            'role' => 'cajero',
            'password' => Hash::make('diazjunior22'),
            // Agrega cualquier otro campo requerido por tu tabla de usuarios
        ]);

        User::create([
            'name' => 'asker',
            'email' => 'asker@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('123'),
            // Agrega cualquier otro campo requerido por tu tabla de usuarios
        ]);




    }
}
