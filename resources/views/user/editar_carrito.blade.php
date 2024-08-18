<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto en el Carrito</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-orange {
            background-color: #FF6600;
            color: white;
        }
        .btn-orange:hover {
            background-color: #e65c00;
            color: white;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h1 class="mb-4">Editar Producto en el Carrito</h1>

    <form action="{{ route('carrito.editar', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="producto" class="form-label">Producto</label>
            <input type="text" class="form-control" id="producto" value="{{ $item->producto->nombre }}" disabled>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{ $item->precio }}" required>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $item->cantidad }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <textarea class="form-control" id="nota" name="nota">{{ $item->nota }}</textarea>
        </div>

        <input type="hidden" name="mesa_id" value="{{ $item->mesa_id }}">

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-orange">Actualizar</button>
            <a href="{{ route('carrito.mostrar', $item->mesa_id) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
