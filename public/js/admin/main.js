// const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

// allSideMenu.forEach(item=> {
// 	const li = item.parentElement;

// 	item.addEventListener('click', function () {
// 		allSideMenu.forEach(i=> {
// 			i.parentElement.classList.remove('active');
// 		})
// 		li.classList.add('active');
// 	})
// });




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






//CAMBIAR LAS SECCIONES
    // Función para ocultar todos los contenidos principales
    document.addEventListener('DOMContentLoaded', function() {
        // Manejar clics en enlaces del sidebar
        const sidebarLinks = document.querySelectorAll('#sidebar .side-menu li a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Evitar comportamiento predeterminado del enlace

                // Remover la clase 'active' de todos los enlaces del sidebar
                sidebarLinks.forEach(l => l.parentElement.classList.remove('active'));
                // Agregar la clase 'active' al enlace clickeado
                link.parentElement.classList.add('active');

                // Ocultar todos los contenidos principales
                hideAllContents();

                // Determinar qué contenido mostrar según el enlace clickeado
                const target = link.getAttribute('data-target');
                document.getElementById(target).classList.remove('hidden');
            });
        });

        function hideAllContents() {
            const contents = document.querySelectorAll('main section');
            contents.forEach(content => content.classList.add('hidden'));
        }

        // Inicialmente ocultar todos los contenidos excepto el dashboard
        hideAllContents();
        document.getElementById('content-dashboard').classList.remove('hidden');
    });