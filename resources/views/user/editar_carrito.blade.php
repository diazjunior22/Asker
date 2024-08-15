@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Producto en el Carrito</h1>

        <form action="{{ route('carrito.editar', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="producto">Producto</label>
                <input type="text" class="form-control" id="producto" value="{{ $item->producto->nombre }}" disabled>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="{{ $item->precio }}" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $item->cantidad }}" min="1" required>
            </div>

            <div class="form-group">
                <label for="nota">Nota</label>
                <textarea class="form-control" id="nota" name="nota">{{ $item->nota }}</textarea>
            </div>

            <input type="hidden" name="mesa_id" value="{{ $item->mesa_id }}">

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('carrito.mostrar', $item->mesa_id) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
