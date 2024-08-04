<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Producto;

class MeseroController extends Controller
{
    public function inicio(){
        $mesas = Mesa::all();
        return view("user.user", compact('mesas'));
    }

    public function productos($id)
{
    $mesa = Mesa::findOrFail($id);
    $productos = Producto::all();

    return view('user.productos', compact('mesa',"productos"));
}




public function show($mesaId, $productoId)
{
    // Obtener el producto por su ID
    $producto = Producto::find($productoId);

    // Obtener la mesa por su ID (opcional)
    $mesa = Mesa::find($mesaId);

    // Verificar si el producto existe
    if (!$producto) {
        abort(404);
    }

    // Pasar el producto y la mesa a la vista
    return view('user.product', [
        'producto' => $producto,
        'mesaId' => $mesaId,
        'mesa' => $mesa
    ]);
}


}


