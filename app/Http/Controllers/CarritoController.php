<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\carrito;
use App\Models\Mesa;


class CarritoController extends Controller

{ 
   
#con esta function estamos agregando los productos al carrito 
    public function agregar(Request $request)
    {
        // Validar datos
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer|min:1',
            'nota' => 'nullable|string',
            'mesa_id' => 'required|integer|exists:mesas,id',
        ]);
    
        // Agregar el producto 
        $carrito = Carrito::create([
            'producto_id' => $request->producto_id,
            'mesa_id' => $request->mesa_id,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'nota' => $request->nota,
            'usuario_id' => auth()->user()->id, // Establece el usuario propietario del carrito
        ]);
        return redirect()->route('mesa.show', ['id' => $request->mesa_id])
        ->with('success', 'Producto agregado al carrito con éxito');
    
    }



    //mostrar todos los productos del carrito  a la hora de hacer click en el icono
    public function mostrarCarrito(Request $request, $mesa_id)

    {    #aqui es para regresae cuando estes en carrito
        $mesaId = Mesa::find($mesa_id);

        $items = Carrito::with('producto')
                    ->where('mesa_id', $mesa_id)
                    ->where('usuario_id', auth()->user()->id)
                    ->get();
    
        return view('user.carrito', compact('items', 'mesa_id',"mesaId"));
    }




    # aqui estamos enviando todos los productos del carrito a un pedido

    public function checkout(Request $request)
{
    $mesa_id = $request->mesa_id;

    // Obtener todos los productos del carrito para la mesa y usuario actual
    $items = Carrito::with('producto')
                ->where('mesa_id', $mesa_id)
                ->where('usuario_id', auth()->user()->id)
                ->get();

    if ($items->isEmpty()) {
        return redirect()->back()->with('error', 'El carrito está vacío');
    }

    // Crear el pedido
    $pedido = Pedido::create([
        'fecha' => now(),
        'estado' => 'pending',
        'total' => 0,
        'id_mesa' => $mesa_id,
        'id_usuario' => auth()->user()->id,
    ]);

    // Crear los detalles del pedido y calcular el total
    $total = 0;
    foreach ($items as $item) {
        $pedido->detalles()->create([
            'id_producto' => $item->producto_id,
            'cantidad' => $item->cantidad,
            'nota' => $item->nota,
        ]);

        // Sumar al total
        $total += $item->producto->precio * $item->cantidad;
    }

    // Actualizar el total del pedido
    $pedido->total = $total;
    $pedido->save();

    // // Limpiar el carrito para esta mesa y usuario
    // Carrito::where('mesa_id', $mesa_id)
    //         ->where('usuario_id', auth()->user()->id)
    //         ->delete();

    // Redirigir al módulo del chef para que pueda ver el pedido
    return redirect()->route('mesa.show', ['id' => $mesa_id])
                     ->with('success', 'Pedido realizado con éxito y enviado al chef');
}


public function finalizar(Request $request)
    {
        $mesa_id = $request->input('mesa_id');
        $usuario_id = auth()->user()->id;

        // Limpiar el carrito para esta mesa y usuario
        Carrito::where('mesa_id', $mesa_id)
               ->where('usuario_id', $usuario_id)
               ->delete();

        // Redirigir a la vista de confirmación del pedido
        return redirect()->route('user');
    }









    public function editar(Request $request, $id)
    {
        $request->validate([
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer|min:1',
            'nota' => 'nullable|string',
        ]);
    
        $carrito = Carrito::where('id', $id)
                          ->where('usuario_id', auth()->user()->id)
                          ->firstOrFail();
    
        $carrito->update([
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'nota' => $request->nota,
        ]);
    
        return redirect()->route('carrito.mostrar', $carrito->mesa_id)
                         ->with('success', 'Producto actualizado en el carrito con éxito');
    }
    

    



public function eliminar($id)
{
    $carrito = Carrito::where('id', $id)
                      ->where('usuario_id', auth()->user()->id)
                      ->first();

    if ($carrito) {
        $carrito->delete();
        return redirect()->back()->with('success', 'Producto eliminado del carrito con éxito');
    }

    return redirect()->back()->with('error', 'Producto no encontrado en el carrito');
}




public function mostrarEdicion($id)
{
    $item = Carrito::with('producto')
                   ->where('id', $id)
                   ->where('usuario_id', auth()->user()->id)
                   ->firstOrFail();

    return view('user.editar_carrito', compact('item'));
}





}  // Fin de la clase CarritoController