<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Mesas y Cobro</title>
    <link href="{{ asset('css/cajero.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <h1>Sistema de Mesas y Cobro</h1>
    <div class="mesas-container">
        <!-- Las mesas se generarán dinámicamente con JavaScript -->
    </div>
    <div class="detalle-mesa" id="detalle-mesa">
        <h2>Mesa <span id="numero-mesa"></span></h2>
        <div id="pedido-actual"></div>
        <button onclick="agregarItem()">Agregar ítem</button>
        <button onclick="cobrar()">Cobrar</button>
    </div>
    <div id="factura"></div>    
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>