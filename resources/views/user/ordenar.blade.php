<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <div class="status">
                <span class="status-indicator"></span>
                <span class="status-text">OCUPADA</span>
            </div>
            <div class="table">MESA 01</div>
            <div class="user-profile">mesero02</div>
        </header>
        
        <div class="search-bar">
            <input type="text" placeholder="BUSCAR">
        </div>
        
        <div class="categories">
            <button class="category-btn active">All</button>
            <button class="category-btn">Perros</button>
            <button class="category-btn">Hamburguesas</button>
            <button class="category-btn">Carnes</button>
        </div>
        
        <div class="menu-items">
            <div class="menu-item">
                <img src="{{ asset('images/hamburguesa-sencilla.jpg') }}" alt="Hamburguesa Sencilla">
                <p>HAMBURGUESA SENCILLA</p>
            </div>
            <div class="menu-item">
                <img src="{{ asset('images/hamburguesa-de-pollo.jpg') }}" alt="Hamburguesa de Pollo">
                <p>HAMBURGUESA DE POLLO</p>
            </div>
            <div class="menu-item">
                <img src="{{ asset('images/hamburguesa-doble-carne.jpg') }}" alt="Hamburguesa Doble Carne">
                <p>HAMBURGUESA DOBLE CARNE</p>
            </div>
            <div class="menu-item">
                <img src="{{ asset('images/hamburguesa-bit-burger.jpg') }}" alt="Hamburguesa BIT BURGER">
                <p>HAMBURGUESA BIT BURGER</p>
            </div>
            <div class="menu-item">
                <img src="{{ asset('images/hamburguesa-de-tocineta.jpg') }}" alt="Hamburguesa de Tocineta">
                <p>HAMBURGUESA DE TOCINETA</p>
            </div>
            <div class="menu-item">
                <img src="{{ asset('images/hamburguesa-gratinada.jpg') }}" alt="Hamburguesa Gratinada">
                <p>HAMBURGUESA GRATINADA</p>
            </div>
        </div>
    </div>
</body>
</html>