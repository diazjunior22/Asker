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
  

}
