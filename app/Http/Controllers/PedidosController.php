<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;


class PedidosController extends Controller
{
    public function mostrarPedidosChef()
{
    // Obtener todos los pedidos que están en estado 'pending'
      // Obtener todos los pedidos con el estado 'pending'
      $pedidos = Pedido::where('estado', 'pending')
      ->get();

    return view('chef.pedidos', compact('pedidos'));
}

}
