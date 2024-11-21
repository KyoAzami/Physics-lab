// Selecciona el botón y el section
const toggleButton = document.getElementById('b1');
const section = document.getElementById('box1');

// Verifica si el section estaba visible en la última sesión
if (localStorage.getItem('sectionVisible') === 'true') {
    section.classList.remove('hidden');
    section.classList.add('visible');
}

// Agrega un evento para desplegar o retraer el section con animación
toggleButton.addEventListener('click', function() {
    if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
        section.classList.add('visible');
        localStorage.setItem('sectionVisible', 'true'); // Guarda el estado en localStorage
    } else {
        section.classList.remove('visible');
        section.classList.add('hidden');
        localStorage.setItem('sectionVisible', 'false'); // Actualiza el estado en localStorage
    }
});
