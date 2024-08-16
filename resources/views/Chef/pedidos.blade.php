@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pedidos Pendientes</h1>

        @if($pedidos->isEmpty())
            <p>No hay pedidos pendientes.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID del Pedido</th>
                        <th>Mesa</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->id_mesa }}</td>
                            <td>{{ number_format($pedido->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
