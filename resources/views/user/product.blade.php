<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto->nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            
        }
        .avatar {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto shadow-sm" style="max-width: 24rem;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('mesa.show', $mesaId) }}" class="text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-left" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H3.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 0 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                    </svg>
                </a>
                <img src="{{ asset('img/pixelcut.png') }}" alt="User" class="avatar">
            </div>
            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="card-img-top" style="object-fit: cover; height: 12rem;">
            <div class="card-body text-center">
    <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
    <p class="card-text text-start">{{ $producto->descripcion }}</p>
    <div class="d-flex justify-content-between align-items-center">
        <!-- <div class="input-group">
            <button class="btn btn-warning text-white">-</button>
            <input type="text" class="form-control text-center" value="1" style="max-width: 50px;" name="cantidad">
            <button class="btn btn-warning text-white">+</button>
        </div> -->
        <div class="text-lg fw-bold text-warning">Total ${{ $producto->precio }}</div>
    </div>
    <div class="d-flex justify-content-around mt-4">
        <form action="{{ route('carrito.agregar')}}" method="POST">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
            <input type="hidden" name="precio" value="{{ $producto->precio }}">
            <input type="hidden" name="mesa_id" value="{{ $mesa->id }}"> <!-- Campo oculto para mesa_id -->
            <input type="number" name="cantidad" class="form-control text-center" value="1" style="max-width: 50px;" min="1">
            <textarea name="nota" class="form-control" placeholder="nota"></textarea>
            <button class="btn btn-warning text-white">Agregar</button>
        </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
