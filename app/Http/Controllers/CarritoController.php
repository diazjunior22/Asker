<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\carrito;

class CarritoController extends Controller

{
    // public function agregarProducto(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'producto_id' => 'required|exists:productos,id',
    //         'precio' => 'required|numeric',
    //         'nota' => 'nullable|string|max:255', // Nota o descripción opcional
    //     ]);

    //         // Aquí puedes encontrar el carrito del cliente o crear uno nuevo
    // $cart = session()->get('carritos', []);

    // $cart[] = [
    //     'producto_id' => $validatedData['producto_id'],
    //     'cantidad' => 1, // O el valor que quieras manejar por defecto
    //     'precio' => $validatedData['precio'],
    //     'nota' => $validatedData['nota'], // Guardar la nota del cliente
    // ];


    // session()->put('carritos', $cart);

    // return redirect()->back()->with('success', 'Producto agregado al carrito con éxito');
    // }

    // public function actualizarCarrito(Request $request)
    // {
    //     // Actualiza la cantidad o nota de un producto en el carrito
    //     $carrito = session()->get('carrito');
    //     $productoId = $request->input('producto_id');
    //     $cantidad = $request->input('cantidad');
    //     $nota = $request->input('nota');

    //     // Busca el DetallePedido correspondiente
    //     $detallePedido = DetallePedido::where('id_pedido', $carrito['id_pedido'])
    //         ->where('id_producto', $productoId)
    //         ->first();

    //     // Actualiza la cantidad o nota
    //     $detallePedido->cantidad = $cantidad;
    //     $detallePedido->nota = $nota;
    //     $detallePedido->save();

    //     return redirect()->back()->with('success', 'Carrito actualizado');
    // }

    // public function eliminarDelCarrito(Request $request)
    // {
    //     // Elimina un producto del carrito
    //     $carrito = session()->get('carrito');
    //     $productoId = $request->input('producto_id');

    //     // Busca el DetallePedido correspondiente
    //     $detallePedido = DetallePedido::where('id_pedido', $carrito['id_pedido'])
    //         ->where('id_producto', $productoId)
    //         ->first();

    //     // Elimina el DetallePedido
    //     $detallePedido->delete();

    //     return redirect()->back()->with('success', 'Producto eliminado del carrito');
    // }

    // public function verCarrito()
    // {
    //     // Muestra el carrito
    //     $carrito = session()->get('carrito');
    //     $detalles = DetallePedido::where('id_pedido', $carrito['id_pedido'])->get();

    //     return view('carrito', compact('detalles'));
    // }


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
    
        // Agregar la información del producto a la tabla detalle_pedidos
        // DetallePedido::create([
        //     'id_pedido' => $carrito->id, // El ID del carrito es el ID del pedido
        //     'id_producto' => $request->producto_id,
        //     'cantidad' => $request->cantidad,
        //     'nota' => $request->nota,
        // ]);
    
        return redirect()->back()->with('success', 'Producto agregado al carrito con éxito');
    }




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
                'id_producto' => $item->producto_id,
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
    
        return redirect()->route('pedidos.mostrar', $pedido->id)->with('success', 'Pedido realizado con éxito');
    }
    















}  // Fin de la clase CarritoController