<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Pendientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .card-header,
        .card-footer {
            background-color: #f8f9fa;
        }

        .btn-custom {
            color: #333;
            border-color: #ced4da;
        }

        .btn-custom:hover {
            background-color: #e9ecef;
        }

        .btn-delete {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">Pedidos Pendientes</h1>
            <div>
                <!-- Puedes añadir aquí botones adicionales si es necesario -->
            </div>
        </div>

        <div class="row g-4">
            @foreach($pedidos as $pedido)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between">
                            <span class="text-muted">Pedido #{{ $pedido->id }}</span>
                            <span class="text-muted">Mesa: {{ $pedido->mesa->numero }}</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Detalles</h5>
                            <ul class="list-unstyled">
                                @foreach($pedido->detalles as $detalle)
                                    <li>
                                        {{ $detalle->producto->nombre }} - Cantidad: {{ $detalle->cantidad }} - Nota: {{ $detalle->nota }}
                                    </li>
                                @endforeach
                            </ul>
                            <p>Total: {{ $pedido->total }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted">Mesero: {{ $pedido->usuario->name }}</span>
                                <span class="text-muted ms-3">Fecha: {{ $pedido->created_at->format('d-m-Y H:i') }}</span>
                            </div>
                            <div>
g
                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este pedido?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6l-1.5 14a2 2 0 0 1-2 2H8.5a2 2 0 0 1-2-2L5 6"></path>
                                            <path d="M9 6v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
