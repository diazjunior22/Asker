const mesas = [];
const mesasContainer = document.querySelector('.mesas-container');
const detalleMesa = document.getElementById('detalle-mesa');
const facturaDiv = document.getElementById('factura');

// Inicializar mesas
for (let i = 1; i <= 10; i++) {
    mesas.push({
        numero: i,
        ocupada: false,
        pedido: []
    });
    const mesaElement = document.createElement('div');
    mesaElement.className = 'mesa';
    mesaElement.textContent = `Mesa ${i}`;
    mesaElement.onclick = () => mostrarDetalleMesa(i);
    mesasContainer.appendChild(mesaElement);
}

function mostrarDetalleMesa(numeroMesa) {
    const mesa = mesas[numeroMesa - 1];
    document.getElementById('numero-mesa').textContent = numeroMesa;
    actualizarPedidoActual(mesa);
    detalleMesa.style.display = 'block';
}

function actualizarPedidoActual(mesa) {
    const pedidoActual = document.getElementById('pedido-actual');
    pedidoActual.innerHTML = '';
    mesa.pedido.forEach((item, index) => {
        const itemElement = document.createElement('div');
        itemElement.className = 'pedido-item';
        itemElement.innerHTML = `
            <span>${item.nombre} - $${item.precio.toFixed(2)}</span>
            <button onclick="eliminarItem(${mesa.numero}, ${index})">Eliminar</button>
        `;
        pedidoActual.appendChild(itemElement);
    });
}

function agregarItem() {
    const numeroMesa = document.getElementById('numero-mesa').textContent;
    const mesa = mesas[numeroMesa - 1];
    const nombreItem = prompt('Nombre del ítem:');
    const precioItem = parseFloat(prompt('Precio del ítem:'));
    if (nombreItem && !isNaN(precioItem)) {
        mesa.pedido.push({ nombre: nombreItem, precio: precioItem });
        actualizarPedidoActual(mesa);
        mesasContainer.children[numeroMesa - 1].classList.add('ocupada');
    }
}

function eliminarItem(numeroMesa, index) {
    const mesa = mesas[numeroMesa - 1];
    mesa.pedido.splice(index, 1);
    actualizarPedidoActual(mesa);
    if (mesa.pedido.length === 0) {
        mesasContainer.children[numeroMesa - 1].classList.remove('ocupada');
    }
}

function cobrar() {
    const numeroMesa = document.getElementById('numero-mesa').textContent;
    const mesa = mesas[numeroMesa - 1];
    const total = mesa.pedido.reduce((sum, item) => sum + item.precio, 0);
    
    facturaDiv.innerHTML = `
        <h2>Factura Mesa ${numeroMesa}</h2>
        ${mesa.pedido.map(item => `<p>${item.nombre}: $${item.precio.toFixed(2)}</p>`).join('')}
        <h3>Total: $${total.toFixed(2)}</h3>
        <button onclick="imprimirFactura()">Imprimir Factura</button>
    `;
    facturaDiv.style.display = 'block';
    
    // Limpiar la mesa
    mesa.pedido = [];
    mesa.ocupada = false;
    mesasContainer.children[numeroMesa - 1].classList.remove('ocupada');
    actualizarPedidoActual(mesa);
}

function imprimirFactura() {
    window.print();
}