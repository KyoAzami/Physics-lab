function saveExperience() {
    // Obtener los valores de calificaciones y comentarios
    const ratings = document.querySelectorAll('input[type="number"]');
    const comments = document.querySelectorAll('textarea');

    // Formatear la información en una cadena
    let content = '';
    ratings.forEach((rating, index) => {
        const comment = comments[index].value;
        content += `${rating.value} - ${comment}\n`;
    });

    // Crear un archivo blob con el contenido
    const blob = new Blob([content], { type: 'text/plain' });
    
    // Crear un enlace para descargar el archivo
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = '../experience.txt';
    a.style.display = 'none';
    
    // Simular un clic para descargar el archivo
    document.body.appendChild(a);
    a.click();
    
    // Eliminar el enlace después de usarlo
    document.body.removeChild(a);
    
    alert('¡Experiencia guardada en experience.txt!');
    
    // Redirigir al index.html
    window.location.href = '../index.html';
    }