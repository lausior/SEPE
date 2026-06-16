<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php 
    require_once('database.php'); // link a database.php
    include_once('vista/header.php'); // link a header.php
    ?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('vista/menu.php'); ?> <!-- link a menu.php -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Usuarios</h2>
                    <!-- Botón para agregar un nuevo usuario -->
                    <a href="nuevoUsuarioForm.php" class="btn btn-success">+ Nuevo Usuario</a>
                </div>
                                            
                <?php
                if (isset($_GET['mensaje'])) {
                    echo '<div class="alert alert-success">✅ ' . htmlspecialchars($_GET['mensaje']) . '</div>';
                }
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger">❌ ' . htmlspecialchars($_GET['error']) . '</div>';
                }
                ?>

                <div class="container justify-content-between">
                    <div class="table">
                        <table class="table table-sm table-striped table-hover">
                            <thead class="thead">
                                <tr>                            
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>DNI</th>
                                    <th>Localidad</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $usuarios = obtener_usuarios();

                                    if (empty($usuarios)) {
                                        echo '<tr><td colspan="7" class="text-center text-warning">No hay usuarios registrados</td></tr>';
                                    } else {
                                        foreach ($usuarios as $usuario) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($usuario['id']) . '</td>';
                                            echo '<td>' . htmlspecialchars($usuario['nombre']) . '</td>';
                                            echo '<td>' . htmlspecialchars($usuario['apellidos']) . '</td>';
                                            echo '<td>' . htmlspecialchars($usuario['dni']) . '</td>';
                                            echo '<td>' . htmlspecialchars($usuario['localidad']) . '</td>';
                                            echo '<td>' . htmlspecialchars($usuario['email']) . '</td>';
                                            echo '<td>
                                                <a href="editarUsuario.php?id=' . $usuario['id'] . '" class="btn btn-sm btn-warning">✏️ Editar</a>
                                                <a href="eliminarUsuario.php?id=' . $usuario['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'¿Eliminar este usuario?\')">🗑️ Eliminar</a>
                                            </td>';
                                            echo '</tr>';
                                        }
                                    }
                                } catch (Exception $e) {
                                    echo '<tr><td colspan="7" class="text-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('vista/footer.php'); ?>
    
</body>
</html>


