<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            background-color: #f0f0f0;
        }
        .profile-container {
            height: 100%;
            display: flex;
            flex-direction: column;
            background-color: white;
        }
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #FF6600;
            color: white;
        }
        .back-button, .options-button {
            font-size: 24px;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .profile-content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .profile-picture {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
        }
        .picture-placeholder {
            width: 100%;
            height: 100%;
            background-color: #ddd;
            border-radius: 50%;
        }
        .camera-icon {
            position: absolute;
            right: 0;
            bottom: 0;
            background-color: #FF6600;
            color: white;
            padding: 8px;
            border-radius: 50%;
            font-size: 20px;
        }
        .profile-info .info-item {
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .profile-info .label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        .profile-info .value {
            font-size: 16px;
        }
        .status-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            background-color: green;
            border-radius: 50%;
            margin-left: 5px;
        }
        .options-menu {
            display: none;
            position: absolute;
            right: 10px;
            top: 60px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        .options-menu a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
        }
        .options-menu a:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <a href="{{ route('user')}}" class="back-button" onclick="goBack()">←</a>
            <h2>Perfil</h2>
            <div class="options-button" onclick="toggleOptions()">⋯</div>
        </div>
        <div class="profile-content">
            <div class="profile-picture">
                <div class="picture-placeholder"></div>
                <div class="camera-icon">📷</div>
            </div>
            <div class="profile-info">
                <div class="info-item">
                    <span class="label">Nombre:</span>
                    <span class="value">Jhon Edison Rojas vazques</span>
                </div>
                <div class="info-item">
                    <span class="label">Correo:</span>
                    <span class="value">jhonertojas@meseroasker.com</span>
                </div>
                <div class="info-item">
                    <span class="label">ID:</span>
                    <span class="value">1042242613</span>
                </div>
                <div class="info-item">
                    <span class="label">Rol:</span>
                    <span class="value">Mesero</span>
                </div>
                <div class="info-item">
                    <span class="label">Estado:</span>
                    <span class="value">Activo <span class="status-indicator"></span></span>
                </div>
            </div>
        </div>
        <div class="options-menu" id="optionsMenu">
            <a href="#">Editar Perfil</a>
            <a href="#">Cambiar Contraseña</a>
            <a href="#">Cerrar Sesión</a>
        </div>
    </div>

    <script>
        

        function toggleOptions() {
            var menu = document.getElementById("optionsMenu");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }
    </script>
</body>
</html>