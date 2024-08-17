<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;


class PedidosController extends Controller
{
  public function mostrarPedido($id)
  {
    $pedido = Pedido::with('detalles.producto')->findOrFail($id);

    return view('chef.pedido', compact('pedido'));
  }
  

}
