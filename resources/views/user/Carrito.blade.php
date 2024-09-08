<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body, html {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            height: 100%;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            background-color: #FF6600;
            color: white;
        }
        .back-button {
            font-size: 24px;
            text-decoration: none;
            color: white;
        }
        .user-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
        .cart-items {
            flex-grow: 1;
            overflow-y: auto;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #FF6600;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            color: white;
        }
        .btn-warning {
            background-color: #f0ad4e;
        }
        .btn-danger {
            background-color: #d9534f;
        }
        .btn-success {
            background-color: #5bc0de;
        }
        .btn-sm {
            font-size: 12px;
            padding: 4px 8px;
        }
        .d-flex {
            display: flex;
        }
        .justify-content-between {
            justify-content: space-between;
        }
        .summary {
            background-color: #eee;
            padding: 15px;
            margin-top: auto;
            border-top: 1px solid #ddd;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            font-size: 14px;
        }
        .pay-button {
            display: block;
            width: 100%;
            background-color: #FF6600;
            color: white;
            border: none;
            padding: 15px;
            font-size: 18px;
            margin-top: 15px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ route('mesa.show', $mesaId) }}" class="back-button">←</a>
            <span>Cantidad Precio</span>
            <img src="user-icon.jpg" alt="Usuario" class="user-icon">
        </div>
        
        <div class="cart-items">
            <h1>Carrito para la Mesa {{ $mesa_id }}</h1>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th>Nota</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->producto->nombre }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>{{ number_format($item->precio, 2) }}</td>
                            <td>{{ number_format($item->precio * $item->cantidad, 2) }}</td>
                            <td>{{ $item->nota }}</td>
                            <td>
                                <a href="{{ route('carrito.editar.form', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="summary d-flex justify-content-between">
                <h3>Total: {{ number_format($items->sum(function($item) { return $item->cantidad * $item->precio; }), 2) }}</h3>
                <form action="{{ route('carrito.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="mesa_id" value="{{ $mesa_id }}">
                    <button class="pay-button">Enviar Pedido</button>
                </form>
                <form action="{{ route('carrito.finalizado') }}" method="POST">
                    @csrf
                    <input type="hidden" name="mesa_id" value="{{ $mesa_id }}">
                    <button class="pay-button">Finalizar Pedido</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
