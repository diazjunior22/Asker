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

<div class="container">
  <!-- aqui van las mesas -->
        <div class="product">
            <div class="container-img">
              <a href="{{route("comidas")}}"><img src="{{$mesa->imagen}}" alt="Producto 1"></a>
            </div>
            <div class="mesa-titulo">
              <h2>Mesa {{$mesa->numero}}</h2>
            </div>
        </div>

        <div class="product">
            <div class="container-img">
              <a href="{{route("comidas")}}"><img src="img/mesita.png" alt="Producto 1"></a>
            </div>
            <div class="mesa-titulo">
              <h2>Mesa 1</h2>
            </div>
        </div>  
        <!-- @foreach($mesas as $mesa) -->
        <li class="mesa-titulo">{{ $mesa->numero }} ({{ $mesa->capacidad }})</li>
        <img src="{{$mesa->imagen}}" alt="">
    @endforeach 



</div>




</body>
</html>






