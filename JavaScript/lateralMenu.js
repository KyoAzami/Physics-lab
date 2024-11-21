// Selecciona el botón de menú y el menú lateral
const menuToggle = document.getElementById('menu-toggle');
const sideMenu = document.getElementById('side-menu');
const mainContent = document.getElementById('main-content');

// Verifica si el menú lateral estaba activo en la última sesión
if (localStorage.getItem('menuActive') === 'true') {
    sideMenu.classList.add('active');
    mainContent.classList.add('active');
}

// Agrega un evento para abrir/cerrar el menú lateral
menuToggle.addEventListener('click', function() {
    sideMenu.classList.toggle('active');
    mainContent.classList.toggle('active');
    
    // Guarda el estado del menú en localStorage
    const isActive = sideMenu.classList.contains('active');
    localStorage.setItem('menuActive', isActive);
});