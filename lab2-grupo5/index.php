<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo 5 - Carga de Archivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header-container {
            background-color: #0d6efd;
            color: white;
            padding: 1.5rem;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

    <header class="header-container mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h1 class="fw-bold m-0">Grupo 5</h1>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <span class="fs-6 d-block fw-light">Integrantes:</span>
                    <p class="m-0 fw-semibold">
                        Anderson Piedra &bull; John Myrie &bull; Deylan Pérez &bull; Leysha Wilson
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Formulario Principal -->
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card card-custom p-4 bg-white">
                    <h3 class="card-title text-center mb-4 text-primary">Subir Archivo</h3>
                    
                    <form action="subir.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="archivo" class="form-label fw-bold text-secondary">Seleccione un archivo</label>
                            <input class="form-control form-control-lg" type="file" id="archivo" name="archivo" required>
                            <div class="form-text">Por favor elija el archivo que desea enviar al servidor.</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                Enviar Archivo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>