<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>Inicio de Sesión</title>
    <style>
        body {
            background: url('img/fondo1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            max-width: 500px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            text-align: center;
        }
        @media (min-width: 768px) {
            .login-container {
                max-width: 700px;
                padding: 30px;
            }
        }
        @media (min-width: 1024px) {
            .login-container {
                max-width: 900px;
                padding: 40px;
            }
        }
        .contenedor-img img {
            width: 100%;
            max-width: 200px;
            height: auto;
            margin: 0 auto 20px auto;
        }
        .form-control {
            background-color: #444;
            border: 1px solid #555;
            color: white;
            margin-bottom: 10px;
            font-size: 1.2rem;
            padding: 10px 15px;
            width: 100%;
        }

        /* Cambia el color del botón en el estado hover a un tono más oscuro */
.btn-primary {
    background-color: #ff6600;
    border: none;
    width: 100%;
    margin-bottom: 10px;
    font-size: 1.2rem;
    padding: 10px 15px;
}

.btn-primary:hover {
    background-color: #e65c00; /* Tono más oscuro de naranja */
}

/* Cambia el color del borde y fondo de los campos de formulario a naranja */
.form-control {
    background-color: #555; /* Mantén el fondo oscuro para los campos de texto */
    border: 1px solid #ff6600; /* Borde naranja */
    color: white;
    margin-bottom: 10px;
    font-size: 1.2rem;
    padding: 10px 15px;
    width: 100%;
}

.form-control:focus {
    border-color: #ff6600; /* Borde naranja en estado activo */
    box-shadow: 0 0 5px rgba(255, 102, 0, 0.5); /* Sombra del borde en estado activo */
}



        .forgot-password {
            color: #ff6600;
        }
    </style>
</head>
<body>
    <main>
        <div class="login-container">
            <div class="contenedor-img">
                <img src="img/pixelcut.png" alt="Logo" class="img-fluid">
            </div>
            <form method="POST" action="{{ route('inicia-sesion') }}">
                @csrf
                <div class="form-group">
                    <input type="text" id="username" class="form-control" placeholder="Username, email & phone number" required name="email">
                </div>
                <div class="form-group">
                    <input type="password" id="password" class="form-control" placeholder="Password" required name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="form-group text-center">
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rZ9qtAXo40Z73YQffH8x3UNBvlgmr1Q1dxHRTbb4RDshnELV1AgtFw5teTsl5sGp" crossorigin="anonymous"></script>
</body>
</html>
