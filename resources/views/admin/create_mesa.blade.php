<!-- resources/views/admin/create_mesa.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mesa</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #ff7f00;
            color: #fff;
            text-align: center;
            font-size: 1.5rem;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-label {
            color: #ff7f00;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #ff7f00;
            border-color: #ff7f00;
        }

        .btn-primary:hover {
            background-color: #e06b00;
            border-color: #e06b00;
        }

        .btn-secondary {
            background-color: #343a40;
            border-color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Crear Nueva Mesa
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('mesas.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="numero" class="form-label">Número:</label>
                                <input type="text" class="form-control" id="numero" name="numero" required>
                            </div>

                            <div class="mb-3">
                                <label for="capacidad" class="form-label">Capacidad:</label>
                                <input type="number" class="form-control" id="capacidad" name="capacidad" required>
                            </div>

                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado:</label>
                                <input type="text" class="form-control" id="estado" name="estado" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Crear Mesa</button>
                                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
