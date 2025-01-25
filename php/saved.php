<?php
// Ruta al archivo de experiencia
$file = '../experience.txt';

// Verifica si se recibieron los datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los valores del formulario
    $experience_general = $_POST['experience_general'] ?? 'No especificado';
    $navigation = $_POST['navigation'] ?? 'No especificado';
    $content_quality = $_POST['content_quality'] ?? 'No especificado';
    $information_usefulness = $_POST['information_usefulness'] ?? 'No especificado';
    $recommendation = $_POST['recommendation'] ?? 'No especificado';
    $comments = $_POST['comments'] ?? 'Sin comentarios';

    // Formatea los datos para guardar en el archivo
    $data = "Experiencia General: $experience_general\n" .
            "Navegación: $navigation\n" .
            "Calidad del Contenido: $content_quality\n" .
            "Utilidad de la Información: $information_usefulness\n" .
            "Recomendación: $recommendation\n" .
            "Comentarios: $comments\n" .
            "-------------------------------------\n";

    // Guarda los datos en el archivo
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirige al index.html después de guardar
    header('Location: ../index.html');
    exit();
} else {
    // Si el acceso no es válido, redirige al formulario
    header('Location: ../experience.html');
    exit();
}