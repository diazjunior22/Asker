<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClienteController;

class PedidosController extends Controller
{
  public function index()
  {
      $pedidos = Pedido::with('detalles.producto', 'mesa', 'usuario')
                        ->where('estado', 'pending')
                        ->get();

      return view('chef.index', compact('pedidos'));
  }

  // Mostrar los detalles de un pedido específico
  public function show($id)
  {
      $pedido = Pedido::with('detalles.producto', 'mesa', 'usuario')->findOrFail($id);
      
      return view('chef.show', compact('pedido'));
  }
  


// PedidoController.php
public function destroy($id)
{
    // Encuentra el pedido por su id
    $pedido = Pedido::find($id);

    if ($pedido) {
        // Elimina el pedido
        $pedido->delete();

        // Redirige a la lista de pedidos con un mensaje de éxito
        return redirect()->route('chef.pedidos')->with('success', 'Pedido eliminado exitosamente.');
    } else {
        // Si no se encuentra el pedido, redirige con un mensaje de error
        return redirect()->route('chef.pedidos')->with('error', 'Pedido no encontrado.');
    }
}




}
