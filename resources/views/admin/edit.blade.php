<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>
<body>
    <h1>Editar Usuario</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>

        <label for="role">Rol:</label>
        <select id="role" name="role" required>
            @foreach($roles as $role)
                <option value="{{ $role }}" {{ $role == $user->role ? 'selected' : '' }}>
                    {{ ucfirst($role) }}
                </option>
            @endforeach
        </select>
        <label for="password">Contraseña (déjalo en blanco si no deseas cambiarla):</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">


        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
