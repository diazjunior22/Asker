@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Carrito para la Mesa {{ $mesa_id }}</h1>

        <table class="table">
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
                            <!-- Botón para editar -->
                             <!-- Botón para editar -->
                            <a href="{{ route('carrito.editar.form', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <!-- Formulario para eliminar -->
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

        <div class="d-flex justify-content-between">
            <h3>Total: {{ number_format($items->sum(function($item) { return $item->cantidad * $item->precio; }), 2) }}</h3>
            <form action="{{ route('carrito.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="mesa_id" value="{{ $mesa_id }}">
                <button class="btn btn-success">Finalizar Pedido</button>
            </form>
        </div>
    </div>

    <!-- Scripts para el funcionamiento de los modales -->
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    @endpush
@endsection
