<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Mesas y Cobro</title>
    <link href="{{ asset('css/cajero.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div class="container">
        <h2>Cajero - Sistema de Comida Rápida</h2>
        
        <!-- Sección para añadir pedidos -->
        <div class="add-order">
            <h3>Añadir Pedido</h3>
            <form action="{{ route('cashier.store') }}" method="POST">
                @csrf
                <input type="text" name="details" placeholder="Detalles del pedido" required>
                <button type="submit">Añadir Pedido</button>
            </form>
        </div>
        
        <!-- Sección para ver y cobrar pedidos -->
        <div class="pending-orders">
            <h3>Pedidos Pendientes</h3>
            <ul>
                @foreach($orders as $order)
                    <li>
                        {{ $order->details }}
                        <form action="{{ route('cashier.destroy', $order) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Cobrar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>