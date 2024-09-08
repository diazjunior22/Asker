<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .profile-header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .options-button {
            font-size: 24px;
            cursor: pointer;
        }

        .profile-picture {
            position: relative;
            margin-top: 20px;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #ff5733;
            object-fit: cover;
        }

        .camera-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #ffffff;
            border-radius: 50%;
            padding: 5px;
            font-size: 20px;
            cursor: pointer;
        }

        .profile-info {
            text-align: left;
            margin-top: 20px;
        }

        .info-item {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }

        .value {
            margin-left: 10px;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            background-color: green;
            border-radius: 50%;
            display: inline-block;
            margin-left: 5px;
        }

        .options-menu {
            display: none;
            position: absolute;
            top: 50px;
            right: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            z-index: 1000;
        }

        .options-menu a {
            display: block;
            padding: 10px 20px;
            color: black;
            text-decoration: none;
        }

        .options-menu a:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
        <a class="btn btn-link text-dark" href="{{ url()->previous() }}">
            &#x21A9;
        </a>
            <h2>Perfil</h2>
            <div class="options-button" onclick="toggleOptions()">⋯</div>
        </div>
        <div class="profile-content">
            <div class="profile-picture">
                <a href="#">
                <img src="{{ asset('img/pixelcut.png') }}" alt="User Avatar" class="avatar">

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
                <!-- <div class="info-item">
                    <span class="label">Estado:</span>
                    <span class="value">{{ $user->status }} <span class="status-indicator"></span></span>
                </div> -->
            </div>
        </div>
        <div class="options-menu" id="optionsMenu">
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
         @csrf
            <button type="submit" class="logout-btn">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </button>
        </form>
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
