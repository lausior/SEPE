<?php
require_once('database.php'); //link a database.php
//Creamos la variable vacía para el mensaje que se mostrará al usuario
$mensaje = '';

//Procesa el formulario solo si se ha enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        //Recibe los datos del formulario
        $nombre = $_POST['nombre'] ?? '';
        $apellidos = $_POST['apellidos'] ?? '';
        $dni = $_POST['dni'] ?? '';
        $localidad = $_POST['localidad'] ?? '';
        $email = $_POST['email'] ?? '';

        // Valida que no estén vacíos
        if (empty($nombre) || empty($apellidos) || empty($dni) || empty($localidad) || empty($email)) {
            throw new Exception('❌ Todos los campos son obligatorios.');//Si están vacíos devuelve una excepción
        }

        // Llama la función para guardar el usuario
        if (insertar_usuario($nombre, $apellidos, $dni, $localidad, $email)) {
            $mensaje = '✅ Usuario creado correctamente.';
        }
    } 
    //Captura la excepción en caso de error
    catch (Exception $e) {
        $mensaje = 'Error: ' . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once('vista/header.php')?> <!-- link a header.php -->
    <div class="container-fluid">
        <div class="row">
            <?php include_once('vista/menu.php')?> <!-- link a menu.php -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Proyecto de Tareas</h2>
                </div>
                <div class="container">
                    <!-- Mostramos el mensaje correspondiente -->
                    <p><?php echo $mensaje; ?></p>
                    <!-- Botón para volver a la lista de usuarios -->
                    <a href="listaUsuarios.php" class="btn btn-primary">Ver usuarios</a>
                </div>
            </main>
        </div>
    </div>
    <?php include_once('vista/footer.php')?> <!-- link a footer.php -->
</body>
</html>