<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto->nombre }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-10">
        <div class="flex items-center justify-between p-4">
            <a href="{{ route('mesa.show', $mesaId) }}" class="text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <img src="https://via.placeholder.com/40" alt="User" class="rounded-full">
        </div>
        <div class="text-center">
            <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover">
            <h1 class="text-lg font-bold mt-4">{{ $producto->nombre }}</h1>
            <p class="text-left px-8 py-4">{{ $producto->descripcion }}</p>
        </div>
        <div class="flex justify-between items-center px-8 py-4">
            <div class="flex items-center space-x-2">
                <button class="bg-orange-500 text-white p-2 rounded-full">-</button>
                <span>1</span>
                <button class="bg-orange-500 text-white p-2 rounded-full">+</button>
            </div>
            <div class="text-lg font-bold text-orange-500">Total ${{ $producto->precio }}</div>
        </div>
        <div class="flex justify-around p-4">
            <button class="bg-orange-500 text-white px-4 py-2 rounded">DESCRIPCIÓN</button>
            <button class="bg-orange-500 text-white px-4 py-2 rounded">Agregar</button>
        </div>
    </div>
</body>
</html>
