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
   OBTENER PRODUCTO
   ========================================================== */

$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
$stmt->execute([':id' => $id]);
$producto = $stmt->fetch();

if (!$producto) {
    header("Location: index.php");
    exit;
}

$errores = [];
$exito = false;

/* ==========================================================
   ACTUALIZACIÓN
   ========================================================== */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT);
    $categoria = filter_input(INPUT_POST, 'categoria_id', FILTER_VALIDATE_INT);

    $activo = isset($_POST['activo']) ? true : false;

    /* ---------------- VALIDACIÓN ---------------- */

    if (strlen($nombre) < 2) {
        $errores['nombre'] = 'Nombre demasiado corto';
    }

    if ($precio === false || $precio < 0) {
        $errores['precio'] = 'Precio no válido';
    }

    if ($stock === false || $stock < 0) {
        $errores['stock'] = 'Stock no válido';
    }

    /* ---------------- UPDATE ---------------- */

    if (empty($errores)) {

        try {

            $stmt = $pdo->prepare("
                UPDATE productos
                SET
                    nombre = :nombre,
                    descripcion = :descripcion,
                    precio = :precio,
                    stock = :stock,
                    categoria_id = :categoria_id,
                    activo = :activo
                WHERE id = :id
            ");

            $stmt->execute([
                ':nombre' => $nombre,
                ':descripcion' => $descripcion,
                ':precio' => $precio,
                ':stock' => $stock,
                ':categoria_id' => $categoria ?: null,
                ':activo' => $activo ? true : false,
                ':id' => $id,
            ]);

            $exito = true;

            /* Recargar datos actualizados */
            $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $producto = $stmt->fetch();

        } catch (PDOException $e) {

            error_log("Error UPDATE producto: " . $e->getMessage());

            $errores['general'] = 'Error al actualizar el producto.';
        }
    }
}

/* ==========================================================
   CATEGORÍAS
   ========================================================== */

$categorias = $pdo
    ->query('SELECT id, nombre FROM categorias ORDER BY nombre')
    ->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Producto #<?= $id ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav>
    <span class="logo">🛒 TiendaDB</span>
    <a href="index.php">← Volver al listado</a>
</nav>

<div class="container">

    <h1>Editar Producto #<?= $id ?></h1>

    <?php if ($exito): ?>
        <div class="msg-ok">
            ✅ Producto actualizado correctamente
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
                    value="<?= htmlspecialchars($_POST["nombre"] ?? $producto["nombre"]) ?>"
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

                <textarea name="descripcion" rows="3"><?= htmlspecialchars($_POST["descripcion"] ?? $producto["descripcion"]) ?></textarea>

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
                        value="<?= $_POST["precio"] ?? $producto["precio"] ?>"
                    >

                </div>

                <div>

                    <label>Stock *</label>

                    <input
                        type="number"
                        name="stock"
                        min="0"
                        required
                        value="<?= $_POST["stock"] ?? $producto["stock"] ?>"
                    >

                </div>

            </div>

            <div class="form-group">

                <label>Categoría</label>

                <select name="categoria_id">

                    <option value="">— Sin categoría —</option>

                    <?php foreach ($categorias as $cat): ?>
                        <option
                            value="<?= $cat["id"] ?>"
                            <?= ($producto["categoria_id"] == $cat["id"]) ? "selected" : "" ?>
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
                        <?= $producto["activo"] ? "checked" : "" ?>
                    >

                    Producto activo

                </label>

            </div>

            <div style="display:flex;gap:12px;margin-top:8px">

                <button type="submit" class="btn btn-primary">
                    💾 Guardar cambios
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