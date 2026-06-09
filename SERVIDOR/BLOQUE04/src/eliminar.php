<?php

require_once 'config/database.php';

$pdo = Database::conectar();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

/* ==========================================================
   VALIDACIÓN DE ID
   ========================================================== */

if (!$id) {
    header("Location: index.php");
    exit;
}

/* ==========================================================
   VERIFICAR QUE EL PRODUCTO EXISTE
   ========================================================== */

$stmt = $pdo->prepare("SELECT nombre FROM productos WHERE id = :id");
$stmt->execute([':id' => $id]);
$producto = $stmt->fetch();

if (!$producto) {
    header("Location: index.php?error=no_encontrado");
    exit;
}

/* ==========================================================
   ELIMINACIÓN
   ========================================================== */

try {

    $stmt = $pdo->prepare("DELETE FROM productos WHERE id = :id");
    $stmt->execute([':id' => $id]);

    header(
        "Location: index.php?ok=eliminado&nombre=" .
        urlencode($producto["nombre"])
    );
    exit;

} catch (PDOException $e) {

    error_log("Error DELETE producto: " . $e->getMessage());

    header("Location: index.php?error=no_eliminado");
    exit;
}