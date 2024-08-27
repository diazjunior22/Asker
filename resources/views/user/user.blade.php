<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página privada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .avatar {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        .nav-menu {
            position: absolute;
            top: 60px;
            right: 0;
            width: 200px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: none; /* Ocultar por defecto */
        }
        .nav-menu.show {
            display: block; /* Mostrar cuando se active */
        }





        .table-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
        }
        .table-card img {
            width: 100%;
        }
        .table-card span {
            display: block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: orange;
            color: white;
            border-radius: 5px;
            transition: background 1s ease;
        }
        .table-card span:hover{
            background-color: black;
            color: bisque;
        }

        .color {
            color: black;
        }
    </style>
</head>

<body class="bg-light">
<header class="bg-white shadow-sm p-3 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button id="menu-toggle" class="btn btn-link text-dark p-0 mr-3">&#9776;</button>
                <h1 class="h4 font-weight-bold m-0">ASKER</h1>
            </div>
            <div class="d-flex align-items-center">
                <span class="mr-2">mesero, @auth {{ Auth::user()->name }} @endauth </span>
                <a href="{{route('perfil', $user->id )}}"><img src="https://via.placeholder.com/40" alt="User Avatar" class="avatar">
                </a>
            </div>
        </div>
        <div id="nav-menu" class="nav-menu">
            <a href="{{ route('logout') }}" class="d-block p-2">Cerrar sesión</a>
        </div>
    </header>
    
    <main class="container">
        <h2 class="h5">Bienvenidos ASKER TEAM</h2>
        <h3 class="text-center font-weight-bold my-4">MESAS DISPONIBLES</h3>
        <div class="row">
            @foreach($mesas as $mesa)
                <div class="col-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                    <a href="{{ route('mesa.show', $mesa->id) }}" class="text-decoration-none">
                        <div class="table-card">
                            <img src="{{ $mesa->imagen }}" alt="Mesa {{ $mesa->numero }}">
                            <span>MESA {{ $mesa->numero }}</span>
                        </div>
                    </a>
                </div>   
            @endforeach
        </div>
    </main>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('nav-menu');
            menu.classList.toggle('show');
        });
    </script>
</body>
</html>
