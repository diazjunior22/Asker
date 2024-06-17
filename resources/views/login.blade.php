<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="{{asset('css/inicio.css') }}">
  <link rel="icon" href="{{asset("img/fast.jpg")}}"> 
   <title>Inicio de Sesión</title>
</head>
<body>
   <main>
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-6">
                       <div class="card-body">
                           <form class="red"  method="POST" action="{{ route('inicia-sesion') }}">
                           @csrf
                               <div class="background-container">
                                   <div class="login-container">
                                       <div class="text-center mb-4">
                                           <img src="{{ asset("img/fast.png") }}" alt="Logo">
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