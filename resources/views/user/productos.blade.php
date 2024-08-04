<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa 01 - Ocupada</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .avatar {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        .status-container {
            display: flex;
            align-items: center;
        }
        .status-checkbox {
            position: relative;
            width: 60px;
            height: 30px;
        }
        .status-checkbox input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .status-slider {
            position: absolute;
            cursor: pointer;
            border-radius: 15px;
            background-color: grey;
            transition: .4s;
            width: 100%;
            height: 100%;
        }
        .status-slider:before {
            content: "";
            position: absolute;
            border-radius: 50%;
            background-color: white;
            transition: .4s;
            width: 22px;
            height: 22px;
            left: 4px;
            bottom: 4px;
        }
        input:checked + .status-slider {
            background-color: orange;
        }
        input:checked + .status-slider:before {
            transform: translateX(30px);
        }
        .status-label {
            margin-left: 10px;
            font-weight: bold;
        }
        .btn-orange {
            background-color: orange;
            border-color: orange;
        }
        .btn-orange:hover {
            background-color: darkorange;
            border-color: darkorange;
        }
    </style>
</head>
<body class="bg-light">
    <header class="header bg-white shadow-sm">
        <div class="d-flex align-items-center">
        <a class="btn btn-link text-dark" href="{{ route("user")}}">
    &#x21A9;
</a>

            <div class="status-container">
                <label class="status-checkbox">
                    <input type="checkbox" id="status" checked>
                    <span class="status-slider"></span>
                </label>
                <label for="status" class="status-label">OCUPADA</label>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <span class="mr-2">mesero02</span>
            <img src="https://via.placeholder.com/40" alt="User Avatar" class="avatar">
        </div>
    </header>
    <main class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-weight-bold">Mesa {{$mesa->numero}}</h2>
            <div class="input-group" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="BUSCAR">
                <div class="input-group-append">
                    <button class="btn btn-orange text-white" type="button">&#x1F50D;</button>
                </div>
                <button class="btn btn-light ml-2" type="button">&#x1F6D2;</button>
            </div>
        </div>
        <div class="btn-group mb-4" role="group">
            <button type="button" class="btn btn-dark text-white">All</button>
            <button type="button" class="btn btn-orange text-white">Perros</button>
            <button type="button" class="btn btn-orange text-white">Hamburguesas</button>
            <button type="button" class="btn btn-orange text-white">Carnes</button>
        </div>

        <div class="row">
        @foreach ($productos as $producto)
    <div class="col-md-4 mb-4">
        <a href="{{ route('producto.show', [$mesa->id, $producto->id]) }}" class="text-decoration-none text-dark">
            <div class="card">
                <img src="{{ $producto->imagen }}" alt="Imagen del producto" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <p class="card-text">Precio: {{ $producto->precio }}</p>
                    <p class="card-text">Cantidad: {{ $producto->cantidad }}</p>
                </div>
            </div>
        </a>
    </div>
@endforeach



    
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
