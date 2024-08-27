<?php

// app/Http/Controllers/ProductController.php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Mesa;


// class ProductController extends Controller
// {
//     public function show($mesaId, $productoId)
//     {
//         $producto = Producto::find($productoId);
//         $mesaId = Mesa::find($mesaId);

//         if (!$producto) {
//             abort(404);
//         }
//         return redirect()->route('producto.show', ['mesaId' => $mesaId, 'productoId' => $productoId]);

//     }
// }

