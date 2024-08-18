<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        /* Tu estilo aquí */
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <a href="{{ route('perfil', ['id' => $user->id]) }}" class="back-button" onclick="goBack()">←</a>
            <h2>Perfil</h2>
            <div class="options-button" onclick="toggleOptions()">⋯</div>
        </div>
        <div class="profile-content">
            <div class="profile-picture">
                <a href="{{ route('perfil', ['id' => $user->id]) }}">
                    <img src="https://via.placeholder.com/120" alt="User Avatar" class="avatar">
                </a>
            </div>
            <div class="profile-info">
                <div class="info-item">
                    <span class="label">Nombre:</span>
                    <span class="value">{{ $user->name }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Correo:</span>
                    <span class="value">{{ $user->email }}</span>
                </div>
                <div class="info-item">
                    <span class="label">ID:</span>
                    <span class="value">{{ $user->id }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Rol:</span>
                    <span class="value">{{ $user->role }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Estado:</span>
                    <span class="value">{{ $user->status }} <span class="status-indicator"></span></span>
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
