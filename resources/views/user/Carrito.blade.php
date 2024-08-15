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
@endsection