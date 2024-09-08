<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>
<body>
    <h1>Crear Usuario</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="role">Rol</label>
        <select id="role" name="role" required>
            @foreach($roles as $role)
                <option value="{{ $role->role }}" {{ old('role') == $role->role ? 'selected' : '' }}>
                    {{ ucfirst($role->role) }}
                </option>
            @endforeach
        </select>     
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
