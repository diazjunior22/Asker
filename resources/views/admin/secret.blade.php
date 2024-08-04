<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset("css/adm.css")}}">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="{{route("logout")}}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
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
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<!-- Contenido para Dashboard -->
<section id="content-dashboard">
    <h1>Dashboard</h1>
    <p>Este es el contenido de Dashboard.</p>
</section>

<!-- Contenido para My Store -->
<section id="content-my-store" style="display: none;">
    <h1>My Store</h1>
    <p>Este es el contenido de My Store.</p>
</section>

<!-- Contenido para Analytics -->
<section id="content-analytics" style="display: none;">
    <h1>Analytics</h1>
    <p>Este es el contenido de Analytics.</p>
</section>

<!-- Contenido para Message -->
<section id="content-message" style="display: none;">
    <h1>Message</h1>
    <p>Este es el contenido de Message.</p>
</section>

<!-- Contenido para Team -->
<section id="content-team" style="display: none;">
    <h1>Team</h1>
	<form method="POST" action="{{route('validar-registro') }}">
        @csrf

        <div class="mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailInput" name="email" required autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password" required>
        </div>

        <div class="mb-3">
            <label for="userInput" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="userInput" name="name" required autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</section>

<!-- Contenido para Settings -->
<section id="content-settings" style="display: none;">
    <h1>Settings</h1>
    <p>Este es el contenido de Settings.</p>
</section>

			
		</main>
		<!-- MAIN -->


	</section>
	<!-- CONTENT -->
	

	<script src="{{asset("js/admin/main.js")}}"></script>
</body>
</html>