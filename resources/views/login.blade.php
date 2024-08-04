<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="{{asset('css/inicio.css') }}">

   <link rel="icon" href="logo.ico" type="image/x-icon">

  <link rel="icon" href="{{asset("img/fast.jpg")}}"> 
   <title>Inicio de Sesión</title>
</head>
<body style="background: url('img/fondo1.jpg'); background-size: cover; background-position: center;" >
   <main>
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-6 col-sm-8 col-xs-12">
                       <div class="card-body" style="padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                           <form class="red"  method="POST" action="{{ route('inicia-sesion') }}">
                           @csrf
                               <div class="background-container">
                                   <div class="login-container">
                                       <div class="contenedor-img">
                                           <img src="{{ asset("img/pixelcut.png") }}" alt="Logo"  class="img-fluid" style="width: 150px; height: 150px; margin: 20px auto;" >
                                       </div>
                                       <div class="form-group">
                                           <label for="username">Username</label>
                                           <input type="text" id="username" class="form-control" placeholder="Enter your username" required name="email">
                                       </div>
                                       <div class="form-group">
                                           <label for="password">Password</label>
                                           <input type="password" id="password" class="form-control" placeholder="Enter your password" required name="password">
                                       </div>
                                       <div class="form-group text-center">
                                           <button type="submit" class="btn btn-primary">Login</button>
                                       </div>
                                       <div class="form-group text-center">
                                           <a href="#">Forgot your password?</a>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   
               </div>
           </div>
       </div>
   </main>
</body>
</html>