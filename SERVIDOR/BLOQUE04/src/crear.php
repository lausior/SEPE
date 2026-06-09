<?php

require_once 'config/database.php';

$pdo = Database::conectar();

$errores = [];
$exito = false;
$nuevo_id = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* ==========================================================
       VALIDACIÓN
       ========================================================== */

    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT);
    $categoria = filter_input(INPUT_POST, 'categoria_id', FILTER_VALIDATE_INT);

    $activo = isset($_POST['activo']) ? true : false;

    if (strlen($nombre) < 2) {
        $errores['nombre'] = 'Nombre demasiado corto (mín. 2 caracteres)';
    }

    if (strlen($nombre) > 200) {
        $errores['nombre'] = 'Nombre demasiado largo (máx. 200 caracteres)';
    }

    if ($precio === false || $precio < 0) {
        $errores['precio'] = 'Precio no válido (debe ser un número positivo)';
    }

    if ($stock === false || $stock < 0) {
        $errores['stock'] = 'Stock no válido (debe ser un entero positivo)';
    }

    /* ==========================================================
       INSERT EN BASE DE DATOS
       ========================================================== */

    if (empty($errores)) {

        try {

            $stmt = $pdo->prepare("
                INSERT INTO productos (
                    nombre,
                    descripcion,
                    precio,
                    stock,
                    categoria_id,
                    activo
                )
                VALUES (
                    :nombre,
                    :descripcion,
                    :precio,
                    :stock,
                    :categoria_id,
                    :activo
                )
                RETURNING id
            ");

            $stmt->execute([
                ':nombre' => $nombre,
                ':descripcion' => $descripcion,
                ':precio' => $precio,
                ':stock' => $stock,
                ':categoria_id' => $categoria ?: null,
                ':activo' => $activo ? true : false,
            ]);

            $nuevo_id = $stmt->fetchColumn();
            $exito = true;

        } catch (PDOException $e) {

            error_log("Error INSERT producto: " . $e->getMessage());

            $errores['general'] = 'Error al guardar el producto. Inténtalo de nuevo.';
        }
    }
}

/* ==========================================================
   CARGA DE CATEGORÍAS
   ========================================================== */

$categorias = $pdo
    ->query('SELECT id, nombre FROM categorias ORDER BY nombre')
    ->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav>
    <span class="logo">🛒 TiendaDB</span>
    <a href="index.php">← Volver al listado</a>
</nav>

<div class="container">

    <h1>Nuevo Producto</h1>

    <?php if ($exito): ?>
        <div class="msg-ok">
            ✅ Producto creado correctamente (ID: <?= $nuevo_id ?>)
            <br>
            <a href="index.php">Ver listado</a> |
            <a href="crear.php">Añadir otro</a>
        </div>
    <?php endif; ?>

    <?php if (isset($errores["general"])): ?>
        <div class="msg-err">
            ❌ <?= $errores["general"] ?>
        </div>
    <?php endif; ?>

    <div class="form-card">

        <form method="POST">

            <div class="form-group">

                <label>Nombre *</label>

                <input
                    type="text"
                    name="nombre"
                    required
                    maxlength="200"
                    value="<?= htmlspecialchars($_POST["nombre"] ?? "") ?>"
                    class="<?= isset($errores["nombre"]) ? "error" : "" ?>"
                >

                <?php if (isset($errores["nombre"])): ?>
                    <div class="msg-error">
                        <?= $errores["nombre"] ?>
                    </div>
                <?php endif; ?>

            </div>

            <div class="form-group">

                <label>Descripción</label>

                <textarea name="descripcion" rows="3"><?= htmlspecialchars($_POST["descripcion"] ?? "") ?></textarea>

            </div>

            <div class="form-group" style="display:grid;grid-template-columns:1fr 1fr;gap:16px">

                <div>

                    <label>Precio (€) *</label>

                    <input
                        type="number"
                        name="precio"
                        step="0.01"
                        min="0"
                        required
                        value="<?= htmlspecialchars($_POST["precio"] ?? "") ?>"
                        class="<?= isset($errores["precio"]) ? "error" : "" ?>"
                    >

                    <?php if (isset($errores["precio"])): ?>
                        <div class="msg-error">
                            <?= $errores["precio"] ?>
                        </div>
                    <?php endif; ?>

                </div>

                <div>

                    <label>Stock *</label>

                    <input
                        type="number"
                        name="stock"
                        min="0"
                        required
                        value="<?= htmlspecialchars($_POST["stock"] ?? "0") ?>"
                        class="<?= isset($errores["stock"]) ? "error" : "" ?>"
                    >

                    <?php if (isset($errores["stock"])): ?>
                        <div class="msg-error">
                            <?= $errores["stock"] ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

            <div class="form-group">

                <label>Categoría</label>

                <select name="categoria_id">

                    <option value="">— Sin categoría —</option>

                    <?php foreach ($categorias as $cat): ?>
                        <option
                            value="<?= $cat["id"] ?>"
                            <?= ($_POST["categoria_id"] ?? "") == $cat["id"] ? "selected" : "" ?>
                        >
                            <?= htmlspecialchars($cat["nombre"]) ?>
                        </option>
                    <?php endforeach; ?>

                </select>

            </div>

            <div class="form-group">

                <label style="display:flex;align-items:center;gap:8px;cursor:pointer">

                    <input
                        type="checkbox"
                        name="activo"
                        value="1"
                        <?= !isset($_POST["activo"]) || $_POST["activo"] ? "checked" : "" ?>
                    >

                    Producto activo (visible en el catálogo)

                </label>

            </div>

            <div style="display:flex;gap:12px;margin-top:8px">

                <button type="submit" class="btn btn-primary">
                    💾 Guardar producto
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>