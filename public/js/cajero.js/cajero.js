// Lista de pedidos (simula una base de datos)
const pedidos = [
    { id: 1, descripcion: "Pedido #1", monto: 25.50 },
    { id: 2, descripcion: "Pedido #2", monto: 34.75 },
    { id: 3, descripcion: "Pedido #3", monto: 15.00 },
];

// Cargar pedidos al iniciar la página
window.onload = function() {
    const selectPedidos = document.getElementById('pedidos');
    pedidos.forEach(pedido => {
        const option = document.createElement('option');
        option.value = pedido.id;
        option.textContent = `${pedido.descripcion} - $${pedido.monto.toFixed(2)}`;
        selectPedidos.appendChild(option);
    });
};

function cobrarYFacturar() {
    const pedidoId = document.getElementById('pedidos').value;
    const metodoPago = document.getElementById('metodo-pago').value;
    const facturaDiv = document.getElementById('factura');
    
    if (pedidoId) {
        const pedido = pedidos.find(p => p.id == pedidoId);
        const fecha = new Date().toLocaleString();
        facturaDiv.innerHTML = `
            <h2>Factura</h2>
            <p><strong>Fecha:</strong> ${fecha}</p>
            <p><strong>Pedido:</strong> ${pedido.descripcion}</p>
            <p><strong>Monto:</strong> $${pedido.monto.toFixed(2)}</p>
            <p><strong>Método de pago:</strong> ${metodoPago}</p>
            <p>Gracias por su pago. Puede retirar su pedido.</p>
        `;
        facturaDiv.style.display = 'block';
        
        // Eliminar el pedido de la lista (simula la retirada del pedido)
        const index = pedidos.findIndex(p => p.id == pedidoId);
        if (index > -1) {
            pedidos.splice(index, 1);
            actualizarListaPedidos();
        }
    } else {
        alert('Por favor, seleccione un pedido.');
    }
}

function actualizarListaPedidos() {
    const selectPedidos = document.getElementById('pedidos');
    selectPedidos.innerHTML = '<option value="">Seleccione un pedido</option>';
    pedidos.forEach(pedido => {
        const option = document.createElement('option');
        option.value = pedido.id;
        option.textContent = `${pedido.descripcion} - $${pedido.monto.toFixed(2)}`;
        selectPedidos.appendChild(option);
    });
}