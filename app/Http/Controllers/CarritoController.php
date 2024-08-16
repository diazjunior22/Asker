<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\carrito;

class CarritoController extends Controller

{ 
   

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
    
        // Agregar el producto al carrito 
        $carrito = Carrito::create([
            'producto_id' => $request->producto_id,
            'mesa_id' => $request->mesa_id,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'nota' => $request->nota,
            'usuario_id' => auth()->user()->id, // Establece el usuario propietario del carrito
        ]);
    
        return redirect()->back()->with('success', 'Producto agregado al carrito con éxito');
    }



    //mostrar todos los productos del carrito
    public function mostrarCarrito(Request $request, $mesa_id)
    {
        $items = Carrito::with('producto')
                    ->where('mesa_id', $mesa_id)
                    ->where('usuario_id', auth()->user()->id)
                    ->get();
    
        return view('user.carrito', compact('items', 'mesa_id'));
    }




    public function checkout(Request $request)
    {
        $mesa_id = $request->mesa_id;
    
        // Obtener todos los productos del carrito para la mesa y usuario actual
        $items = Carrito::with('producto') // Asegúrate de que `producto` es una relación definida
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
            'total' => 0, // Se actualizará después
            'id_mesa' => $mesa_id,
            'id_usuario' => auth()->user()->id,
        ]);
    
        // Crear los detalles del pedido y calcular el total
        $total = 0;
        foreach ($items as $item) {
            $detalle = $pedido->detalles()->create([
                'id_producto' => $item->producto_id, // Asegúrate de que este campo tiene un valor válido
                'cantidad' => $item->cantidad,
                'nota' => $item->nota,
            ]);
        
            // Sumar al total (suponiendo que el precio se obtiene del producto relacionado)
            $total += $item->producto->precio * $item->cantidad;
        }
        
    
        // Actualizar el total del pedido
        $pedido->total = $total;
        $pedido->save();
    
        // Limpiar el carrito para esta mesa y usuario
        Carrito::where('mesa_id', $mesa_id)
                    ->where('usuario_id', auth()->user()->id)
                    ->delete();
    
        return redirect()->route('mesa.show', $pedido->id)->with('success', 'Pedido realizado con éxito');
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