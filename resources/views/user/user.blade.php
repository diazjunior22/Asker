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
    <!-- <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between py-3 mb-4 border-bottom">
            <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                Página de usuario @auth {{Auth::user()->name}}  @endauth
            </a>
            <div class="col-md-3 text-end">
                <a href="{{ route('logout') }}">
                    <button type="button" class="btn btn-outline-primary me-2">Salir</button>
                </a>
            </div>
    </header> -->

    <nav class="menu">
  <div class="navbar">
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Acerca de</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
  </div>
  <div class="usuario">
    <img src="foto_usuario.jpg" alt="Foto del usuario">
    <span>Nombre del usuario</span>
  </div>
</nav>


<main>
<div class="mesas-container">
    @foreach($mesas as $mesa)
        <div class="mesa">
           <div class="contenedor-img"></div><img src="{{ $mesa->imagen }}" alt="Mesa {{ $mesa->numero }}"></div>
           <div class="numero-mesa">Mesa {{ $mesa->numero }}</div>
 
        </div>


    @endforeach
</div>



</main>


</body>
</html>






