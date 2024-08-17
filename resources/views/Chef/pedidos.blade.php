<!-- resources/views/chef/pedido.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Pedido</title>
</head>
<body>
    <h1>Detalles del Pedido #{{ $pedido->id }}</h1>
    <p><strong>Fecha:</strong> {{ $pedido->fecha }}</p>
    <p><strong>Total:</strong> {{ $pedido->total }}</p>

    <h2>Productos:</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->nota }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
