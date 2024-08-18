@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Pedido #{{ $pedido->id }}</h1>
    <p>Mesa: {{ $pedido->mesa->numero }}</p>
    <p>Mesero: {{ $pedido->usuario->name }}</p>
    <p>Fecha: {{ $pedido->fecha }}</p>

    <h2>Productos</h2>
    <ul>
        @foreach($pedido->detalles as $detalle)
            <li>
                {{ $detalle->producto->nombre }} - Cantidad: {{ $detalle->cantidad }} - Nota: {{ $detalle->nota }}
            </li>
        @endforeach
    </ul>

    <p>Total: {{ $pedido->total }}</p>
</div>
@endsection
