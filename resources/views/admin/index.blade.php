<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('css/adm.css')}}">

	<title>ASKER ADM</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">ASKER AD</span>

		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" data-target="dashboard">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="personal">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Personal</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="pedidos-en-curso">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Pedidos En curso</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="mesas">
					<i class='bx bxs-group' ></i>
					<span class="text">Mesas</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" data-target="settings">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn">
            <i class='bx bxs-log-out-circle'></i>
            <span class="text">Logout</span>
        </button>
    </form>
</li>

		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">menu</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="{{route('perfil', $user->id )}}"><img src="{{ asset('img/pixelcut.png') }}" alt="User Avatar" class="avatar"></a>
			</a>
		</nav>



		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<!-- Secciones -->
            
			<section id="dashboard">

				<h1>Dashboard</h1>
				<p>Este es el contenido de Dashboard.</p>
			</section>

			<section id="historial" class="hidden">
                    <h1>HISTORIAL</h1>
			</section>
		<!-- AQUI ESTA LA SECTION DEL PERSONAL  -->
			<section id="personal" class="hidden">
				<h1>Personal</h1>
				<p>Este es el contenido de Personal.</p>
                <h1>Gestión de Usuarios</h1>
                <form action="{{ route('users.create') }}" method="get" style="display: inline;">
                    <button type="submit" id="btn-add-user" class="btn btn-primary">Agregar Nuevo Usuario</button>
                </form>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td> <!-- Muestra el rol desde la tabla de usuarios -->
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
			</section>
		<!-- AQUI ESTA LA SECTION DEL los Pedidos  -->
			<section id="pedidos-en-curso" class="hidden">
				<h1>Pedidos en Curso</h1>
    <!-- Tabla de Pedidos -->
   					<table class="table">
   					    <thead>
   					        <tr>
   					            <th>#</th>
   					            <th>Fecha</th>
   					            <th>Usuario</th>
   					            <th>Mesa</th>
   					            <th>Detalles</th>
   					            <th>Estado</th>
   					        </tr>
   					    </thead>
   					    <tbody>
   					        @foreach ($pedidos as $pedido)
   					            <tr>
   					                <td>{{ $loop->iteration }}</td>
   					                <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
   					                <td>{{ $pedido->usuario->nombre }}</td>
   					                <td>{{ $pedido->mesa->numero }}</td>
   					                <td>
   					                    <ul>
   					                        @foreach ($pedido->detalles as $detalle)
   					                            <li>{{ $detalle->producto->nombre }} - Cantidad: {{ $detalle->cantidad }}</li>
   					                        @endforeach
   					                    </ul>
   					                </td>
   					                <td>{{ $pedido->estado }}</td>
   					            </tr>
   					        @endforeach
   					    </tbody>
   					</table>
			</section>

			<section id="mesas" class="hidden">
    <h1>Mesas</h1>
    
    <!-- Botón para agregar nuevas mesas -->
    <form action="{{ route('mesas.create') }}" method="get" style="display: inline;">
        <button type="submit" id="btn-add-mesa" class="btn btn-primary">Agregar Nueva Mesa</button>
    </form>

    <!-- Conteo Total de Mesas -->
    <p>Total de Mesas: {{ $totalMesas }}</p>

    <!-- Tabla de Mesas -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Número</th>
                <th>Capacidad</th>
                <th>Estado</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mesas as $mesa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mesa->numero }}</td>
                    <td>{{ $mesa->capacidad }}</td>
                    <td>{{ $mesa->estado }}</td>
                    <td><img src="{{ $mesa->imagen }}" alt="Imagen de Mesa" style="width: 100px;"></td>
                    <td>
                        <!-- Botón para eliminar mesa -->
                        <form action="{{ route('mesas.destroy', $mesa->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta mesa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
			</section>


		<section id="settings" class="hidden">
				<h1>Settings</h1>
				<p>Este es el contenido de Settings.</p>
			</section>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Obtén todos los enlaces del menú
			const menuLinks = document.querySelectorAll('ul.side-menu a');

			// Añade el evento de clic a cada enlace
			menuLinks.forEach(link => {
				link.addEventListener('click', function(e) {
					e.preventDefault();  // Evita el comportamiento por defecto del enlace

					// Oculta todas las secciones
					document.querySelectorAll('main section').forEach(section => {
						section.classList.add('hidden');
					});

					// Remueve la clase 'active' de todos los ítems del menú
					menuLinks.forEach(item => item.parentElement.classList.remove('active'));

					// Agrega la clase 'active' al ítem del menú clicado
					link.parentElement.classList.add('active');

					// Muestra la sección correspondiente basada en el data-target
					const targetSection = link.getAttribute('data-target');
					document.getElementById(targetSection).classList.remove('hidden');
				});
			});
		});

// cerrar el menu 

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})
















	</script>

	<style>
		.hidden {
			display: none;
		}

		.avatar {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
	</style>
</body>
</html>
