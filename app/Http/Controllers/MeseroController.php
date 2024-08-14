<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Producto;
use App\Models\Categoria;


class MeseroController extends Controller
{
    //aqui estamos retornarnos todas las mesas
    public function inicio(){
        $mesas = Mesa::all();
        return view("user.user", compact('mesas'));
    }




    //aqui estamos mostrandos todos los producto de la base de datos y las categorias
    public function productos($id, $categoria = null)
    {
        $mesa = Mesa::find($id);
        $categorias = Categoria::all(); // Obtener todas las categorías
    
        if ($categoria === 'all') {
            $productos = Producto::all();
        } elseif ($categoria) {
            $productos = Producto::join('categorias', 'productos.id_categoria', '=', 'categorias.id')
                ->where('categorias.nombre', $categoria)
                ->get();
        } else {
            $productos = Producto::all();
        }
    
        return view('user.productos', compact('productos', 'mesa', 'categorias'));
    }





    
//aqui mostramos producto por producto mas detallado
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