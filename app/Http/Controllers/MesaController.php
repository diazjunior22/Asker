<?php
// app/Http/Controllers/MesaController.php
// app/Http/Controllers/MesaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;

class MesaController extends Controller
{
    public function create()
    {
        return view('admin.create_mesa'); // Vista para crear una nueva mesa
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'estado' => 'required|string|max:255',
        ]);

        // Asignar una imagen predeterminada si no se proporciona
        $validated['imagen'] = 'https://muma.co/wp-content/uploads/2023/07/MESA-CBP-CIRCULAR.png';

        Mesa::create($validated);

        return redirect()->route('admin.index')->with('success', 'Mesa creada exitosamente.');
    }
}

