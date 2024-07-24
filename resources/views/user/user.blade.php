<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página privada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/mesero.css")}}">

</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between py-3 mb-4 border-bottom">
            <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                Página de usuario @auth {{Auth::user()->name}}  @endauth
            </a>
            <div class="col-md-3 text-end">
                <a href="{{ route('logout') }}">
                    <button type="button" class="btn btn-outline-primary me-2">Salir</button>
                </a>
            </div>
        </header>
    </div>

    <div class="container">
        <div class="product">
          <img src="img/mesita.png" alt="Producto 1">
          <div class="info">
            <h2>Nombre del Producto 1</h2>
            <p>Descripción corta del producto.</p>
            <a href="{{route("comidas")}}">Ordenar</a>
          </div>
        </div>
      
        <div class="product">
          <img src="img/mesita.png" alt="Producto 2">
          <div class="info">
            <h2>Nombre del Producto 2</h2>
            <p>Descripción corta del producto.</p>
            <a href="ordenar.blade.php">Ordenar</a>
          </div>
        </div>

        <div class="container">
            <div class="product">
              <img src="img/mesita.png" alt="Producto 1">
              <div class="info">
                <h2>Nombre del Producto 1</h2>
                <p>Descripción corta del producto.</p>
                <a href="producto1.html">Ordenar</a>
              </div>
            </div>
          
            <div class="product">
              <img src="img/mesita.png" alt="Producto 2">
              <div class="info">
                <h2>Nombre del Producto 2</h2>
                <p>Descripción corta del producto.</p>
                <a href="producto2.html">Ordenar</a>
              </div>
            </div>

            <div class="container">
                <div class="product">
                  <img src="img/mesita.png" alt="Producto 1">
                  <div class="info">
                    <h2>Nombre del Producto 1</h2>
                    <p>Descripción corta del producto.</p>
                    <a href="producto1.html">Ordenar</a>
                  </div>
                </div>
              
                <div class="product">
                  <img src="img/mesita.png" alt="Producto 2">
                  <div class="info">
                    <h2>Nombre del Producto 2</h2>
                    <p>Descripción corta del producto.</p>
                    <a href="producto2.html">Ordenar</a>
                  </div>
                </div>

  <!-- Agrega más productos según necesites -->

</div>

</body>
</html>






</body>
</html>
