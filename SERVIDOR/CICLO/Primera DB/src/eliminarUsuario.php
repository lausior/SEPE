<?php
require_once('database.php');

// Obtiene el ID del usuario
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header('Location: listaUsuarios.php');
    exit;
}

try {
    // Verifica que el usuario existe antes de eliminar
    $usuario = obtener_usuario_por_id((int)$id);
    
    // Elimina el usuario
    if (eliminar_usuario((int)$id)) {
        header('Location: listaUsuarios.php?mensaje=Usuario eliminado correctamente');
        exit;
    }
} catch (Exception $e) {
    header('Location: listaUsuarios.php?error=' . urlencode($e->getMessage()));
    exit;
}
?>
