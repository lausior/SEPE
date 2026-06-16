<?php
require_once('database.php');

$mensaje = '';
$usuario = null;

// Obtiene el ID del usuario
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header('Location: listaUsuarios.php');
    exit;
}

try {
    $usuario = obtener_usuario_por_id((int)$id);
} catch (Exception $e) {
    header('Location: listaUsuarios.php');
    exit;
}

// Procesa el formulario si se ha enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nombre = $_POST['nombre'] ?? '';
        $apellidos = $_POST['apellidos'] ?? '';
        $dni = $_POST['dni'] ?? '';
        $localidad = $_POST['localidad'] ?? '';
        $email = $_POST['email'] ?? '';

        if (empty($nombre) || empty($apellidos) || empty($dni) || empty($localidad) || empty($email)) {
            throw new Exception('❌ Todos los campos son obligatorios.');
        }

        if (actualizar_usuario((int)$id, $nombre, $apellidos, $dni, $localidad, $email)) {
            $mensaje = '✅ Usuario actualizado correctamente.';
            $usuario = obtener_usuario_por_id((int)$id);
        }
    } catch (Exception $e) {
        $mensaje = '❌ Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once('vista/header.php')?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('vista/menu.php')?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Editar Usuario</h2>
                </div>
                <div class="container">
                    <?php if ($mensaje) { ?>
                        <div class="alert alert-info"><?php echo $mensaje; ?></div>
                    <?php } ?>
                    
                    <?php if ($usuario) { ?>
                        <form action="editarUsuario.php?id=<?php echo $usuario['id']; ?>" method="POST" class="w-50">
                            <!-- NOMBRE -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                            </div>
                            <!-- APELLIDOS -->
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>" required>
                            </div>
                            <!-- DNI -->
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" value="<?php echo htmlspecialchars($usuario['dni']); ?>" required>
                            </div>
                            <!-- LOCALIDAD -->
                            <div class="mb-3"> 
                                <label for="localidad" class="form-label">Localidad</label>
                                <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo htmlspecialchars($usuario['localidad']); ?>" required>
                            </div>
                            <!-- EMAIL -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="listaUsuarios.php" class="btn btn-secondary">Cancelar</a>
                        </form>
                    <?php } ?>
                </div>
            </main>
        </div>
    </div>
    <?php include_once('vista/footer.php')?>
</body>
</html>
