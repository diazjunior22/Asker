@extends('layouts.app')

@section('content')
    <div class="cajero">
        <h2>Mesas con Pedidos</h2>
        <div class="mesas">
            @foreach ($mesas as $mesa)
                <div class="mesa" data-total="{{ $mesa->pedidos->sum('total') }}">
                    Mesa {{ $mesa->numero }}
                </div>
            @endforeach
        </div>

        <h2>Facturación</h2>
        <div class="facturacion">
            <form id="form-factura" method="POST" action="{{ route('factura.generar') }}">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="total">Total a Pagar:</label>
                <input type="number" id="total" name="total" readonly>

                <button type="submit">Facturar</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Función para actualizar el total al hacer clic en una mesa
        const mesas = document.querySelectorAll('.mesa');
        mesas.forEach(mesa => {
            mesa.addEventListener('click', () => {
                const total = mesa.dataset.total;
                document.getElementById('total').value = total;
            });
        });
    </script>
@endpush