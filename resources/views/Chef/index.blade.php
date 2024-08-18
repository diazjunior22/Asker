@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos Pendientes</h1>
    <ul>
        @foreach($pedidos as $pedido)
            <li>
                Pedido #{{ $pedido->id }} - Mesa: {{ $pedido->mesa->numero }} - Mesero: {{ $pedido->usuario->name }}
                <a href="{{ route('mostrar.pedido', $pedido->id) }}">Ver detalles</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
