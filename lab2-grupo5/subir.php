<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Verificar si el archivo fue recibido sin errores
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        
        $archivoTmpName = $_FILES['archivo']['tmp_name'];
        $nombreOriginal = $_FILES['archivo']['name'];
        $tamanoArchivo  = $_FILES['archivo']['size'];
        
        // 2. Definir carpeta de destino
        $directorioDestino = 'uploads/';

        // Crear la carpeta si no existe
        if (!file_exists($directorioDestino)) {
            mkdir($directorioDestino, 0777, true);
        }

        // 3. Generar un nombre único para evitar sobrescribir archivos con el mismo nombre
        $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
        $nuevoNombre = uniqid('file_', true) . '.' . $extension;
        $rutaFinal = $directorioDestino . $nuevoNombre;

        // 4. Mover el archivo desde la carpeta temporal al destino final
        if (move_uploaded_file($archivoTmpName, $rutaFinal)) {
            echo "
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            </head>
            <body class='bg-light p-5'>
                <div class='container col-md-6 text-center'>
                    <div class='alert alert-success p-4 shadow-sm' role='alert'>
                        <h4 class='alert-heading'>¡Archivo subido con éxito!</h4>
                        <p class='mb-0'>El archivo <strong>" . htmlspecialchars($nombreOriginal) . "</strong> se ha guardado correctamente.</p>
                        <hr>
                        <a href='index.php' class='btn btn-outline-success btn-sm'>Volver al formulario</a>
                    </div>
                </div>
            </body>
            </html>";
        } else {
            echo "Error: No se pudo guardar el archivo en el servidor.";
        }

    } else {
        echo "Error al cargar el archivo. Código: " . $_FILES['archivo']['error'];
    }
} else {
    header('Location: index.html');
    exit;
}
?>
