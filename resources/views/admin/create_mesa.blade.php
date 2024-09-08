<!-- resources/views/admin/create_mesa.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mesa</title>
    <link rel="stylesheet" href="{{ asset('css/adm.css') }}">
</head>
<body>

    <section id="content">
        <main>
            <h1>Crear Nueva Mesa</h1>
            <form action="{{ route('mesas.store') }}" method="POST">
                @csrf

                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required>

                <label for="capacidad">Capacidad:</label>
                <input type="number" id="capacidad" name="capacidad" required>

                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required>

                <button type="submit">Crear Mesa</button>
            </form>
        </main>
    </section>

</body>
</html>
