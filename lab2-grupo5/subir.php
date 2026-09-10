<?php
// nos dice si el archivo fue subido correctamente y no excede el tamaño máximo permitido
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        // Obtenemos información del archivo subido
        $archivoTmpName = $_FILES['archivo']['tmp_name'];
        $nombreOriginal = $_FILES['archivo']['name'];
        $tamanoArchivo  = $_FILES['archivo']['size'];
        // Definimos el directorio donde se guardarán los archivos subidos
        $directorioDestino = 'uploads/';
// hace una extensión con el nombre del archivo original y le asigna un nombre único para evitar conflictos
        $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
        $nuevoNombre = uniqid('file_', true) . '.' . $extension;
        $rutaFinal = $directorioDestino . $nuevoNombre;
// Verificamos si el tamaño del archivo es menor o igual a 25 MB (25000000 bytes)
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
                        <p class='mb-0'>El archivo se ha guardado correctamente con el nombre de: " . htmlspecialchars($nuevoNombre) . "</p>
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
        echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            </head>
            <body class='bg-light p-5'>
                <div class='container col-md-6 text-center'>
                    <div class='alert alert-danger p-4 shadow-sm' role='alert'>
                        <h4 class='alert-heading'>¡El archivo excede el tamaño máximo aceptado!</h4>
                        <hr>
                        <a href='index.php' class='btn btn-outline-danger btn-sm'>Volver al formulario</a>
                    </div>
                </div>
            </body>
            </html>";
    }
?>
