<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body, html {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            height: 100%;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            background-color: #FF6600;
            color: white;
        }
        .back-button {
            font-size: 24px;
            text-decoration: none;
            color: white;
        }
        .user-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
        .cart-items {
            flex-grow: 1;
            overflow-y: auto;
            padding: 10px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #444;
            background-color: #333;
            color: white;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .item-image {
            width: 60px;
            height: 60px;
            margin-right: 15px;
            border-radius: 5px;
            object-fit: cover;
        }
        .item-details {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .quantity-select {
            background-color: #FF6600;
            color: white;
            border: none;
            padding: 8px;
            border-radius: 5px;
            margin: 5px 5px 5px 0;
        }
        .price {
            background-color: #FF6600;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            margin: 5px;
        }
        .remove-button {
            background-color: #FF6600;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px 0 5px 5px;
        }
        .summary {
            background-color: #eee;
            padding: 15px;
            margin-top: auto;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            font-size: 14px;
        }
        .pay-button {
            display: block;
            width: 100%;
            background-color: #FF6600;
            color: white;
            border: none;
            padding: 15px;
            font-size: 18px;
            margin-top: 15px;
            cursor: pointer;
        }
        @media (max-width: 480px) {
            .item-details {
                flex-direction: column;
                align-items: flex-start;
            }
            .remove-button {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="#" class="back-button">←</a>
            <span>Cantidad Precio</span>
            <img src="user-icon.jpg" alt="Usuario" class="user-icon">
        </div>
        
        <div class="cart-items" id="cartItems">
            <!-- Los items del carrito se generarán dinámicamente aquí -->
        </div>
        
        <div class="summary">
            <div class="summary-row">
                <span>SUBTOTAL:</span>
                <span id="subtotal">$0</span>
            </div>
            <div class="summary-row">
                <span>TOTAL:</span>
                <span id="total">$0</span>
            </div>
            <div class="summary-row">
                <span>CANCELADO:</span>
                <span id="cancelled">$0</span>
            </div>
            <div class="summary-row">
                <span>CAMBIO ENTREGADO:</span>
                <span id="change">$0</span>
            </div>
        </div>
        
        <button class="pay-button" onclick="COBRAR()">COBRAR</button>
        <button class="pay-button" onclick="ENVIAR_A_COCINA()">ENVIAR_A_COCINA</button>
    </div>

    <script>
        // Datos de ejemplo (en un escenario real, estos vendrían del backend)
        let cartItems = [
            { id: 1, name: 'Hamburguesa', price: 79800, quantity: 2, image: 'burger.jpg' },
            { id: 2, name: 'Pizza', price: 50000, quantity: 1, image: 'pizza.jpg' },
            { id: 3, name: 'Tacos', price: 30000, quantity: 1, image: 'tacos.jpg' },
            { id: 4, name: 'Pasta', price: 39900, quantity: 1, image: 'pasta.jpg' }
        ];

        function renderCart() {
            const cartContainer = document.getElementById('cartItems');
            cartContainer.innerHTML = '';
            cartItems.forEach(item => {
                cartContainer.innerHTML += `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}" class="item-image">
                        <div class="item-details">
                            <select class="quantity-select" onchange="updateQuantity(${item.id}, this.value)">
                                ${[1,2,3,4,5].map(num => `<option value="${num}" ${item.quantity === num ? 'selected' : ''}>${num}</option>`).join('')}
                            </select>
                            <span class="price">$${(item.price * item.quantity).toLocaleString()}</span>
                            <button class="remove-button" onclick="removeItem(${item.id})">Eliminar</button>
                        </div>
                    </div>
                `;
            });
            updateSummary();
        }

        function updateQuantity(id, newQuantity) {
            const item = cartItems.find(item => item.id === id);
            if (item) {
                item.quantity = parseInt(newQuantity);
                renderCart();
            }
        }

        function removeItem(id) {
            cartItems = cartItems.filter(item => item.id !== id);
            renderCart();
        }

        function updateSummary() {
            const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            document.getElementById('subtotal').textContent = `$${subtotal.toLocaleString()}`;
            document.getElementById('total').textContent = `$${subtotal.toLocaleString()}`;
            // Aquí puedes agregar lógica para calcular el cancelado y el cambio si es necesario
        }

        function COBRAR() {
            alert('Procesando COBRO...');
            // Aquí iría la lógica de pago
        }

        // Inicializar el carrito
        renderCart();
    </script>
</body>
</html>