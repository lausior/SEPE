<?php

require_once 'config/database.php';

$pdo = Database::conectar();

/* ==========================================================
   ESTADÍSTICAS
   ========================================================== */

$stmt = $pdo->query(
    'SELECT COUNT(*) AS total
     FROM productos
     WHERE activo = TRUE'
);
$stats_activos = $stmt->fetch()["total"];

$stmt = $pdo->query(
    'SELECT COUNT(*) AS total
     FROM productos
     WHERE stock < 5'
);
$stats_stock_bajo = $stmt->fetch()["total"];

$stmt = $pdo->query(
    'SELECT SUM(precio * stock) AS valor
     FROM productos
     WHERE activo = TRUE'
);
$stats_valor = number_format($stmt->fetch()["valor"] ?? 0, 2);

/* ==========================================================
   FILTROS
   ========================================================== */

$busqueda = trim($_GET['q'] ?? '');
$categoria = (int)($_GET['cat'] ?? 0);

/* ==========================================================
   CONSULTA PRINCIPAL CON FILTROS
   ========================================================== */

$sql = "
    SELECT
        p.id,
        p.nombre,
        p.descripcion,
        p.precio,
        p.stock,
        p.activo,
        p.creado_en,
        p.actualizado_en,
        c.nombre AS categoria_nombre
    FROM productos p
    LEFT JOIN categorias c
        ON p.categoria_id = c.id
    WHERE 1 = 1
";

$params = [];

if ($busqueda) {
    $sql .= "
        AND (
            p.nombre ILIKE :busqueda
            OR p.descripcion ILIKE :busqueda
        )
    ";

    $params[':busqueda'] = '%' . $busqueda . '%';
}

if ($categoria > 0) {
    $sql .= " AND p.categoria_id = :categoria";
    $params[':categoria'] = $categoria;
}

$sql .= " ORDER BY p.id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$productos = $stmt->fetchAll();

/* ==========================================================
   CATEGORÍAS PARA EL FILTRO
   ========================================================== */

$categorias = $pdo
    ->query('SELECT id, nombre FROM categorias ORDER BY nombre')
    ->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tienda — Gestión de Productos</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav>
    <span class="logo">🛒 TiendaDB</span>

    <a href="index.php">Productos</a>

    <a
        href="crear.php"
        class="btn btn-primary"
        style="margin-left:auto"
    >
        ➕ Nuevo producto
    </a>
</nav>

<div class="container">

    <h1>Gestión de Productos</h1>

    <!-- Estadísticas -->
    <div class="stats">

        <div class="stat-card">
            <div class="num"><?= $stats_activos ?></div>
            <div class="lbl">Productos activos</div>
        </div>

        <div class="stat-card">
            <div class="num"><?= $stats_stock_bajo ?></div>
            <div class="lbl">Stock bajo (&lt; 5)</div>
        </div>

        <div class="stat-card">
            <div class="num"><?= $stats_valor ?> €</div>
            <div class="lbl">Valor del inventario</div>
        </div>

    </div>

    <!-- Filtros -->
    <form method="GET" class="actions">

        <input
            type="text"
            name="q"
            placeholder="Buscar producto..."
            value="<?= htmlspecialchars($busqueda) ?>"
            style="flex:1;padding:8px;"
        >

        <select name="cat" style="padding:8px;">

            <option value="0">
                Todas las categorías
            </option>

            <?php foreach ($categorias as $cat): ?>

                <option
                    value="<?= $cat["id"] ?>"
                    <?= $categoria == $cat["id"] ? "selected" : "" ?>
                >
                    <?= htmlspecialchars($cat["nombre"]) ?>
                </option>

            <?php endforeach; ?>

        </select>

        <button type="submit" class="btn btn-primary">
            🔍 Filtrar
        </button>

        <a href="index.php" class="btn btn-secondary">
            ✕ Limpiar
        </a>

    </form>

    <!-- Tabla de productos -->
    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

        <?php if (empty($productos)): ?>

            <tr>
                <td
                    colspan="8"
                    style="text-align:center;padding:24px;color:#8AABAB;"
                >
                    No se encontraron productos
                </td>
            </tr>

        <?php else: ?>

            <?php foreach ($productos as $p): ?>

                <tr>

                    <td><?= $p["id"] ?></td>

                    <td>
                        <strong>
                            <?= htmlspecialchars($p["nombre"]) ?>
                        </strong>
                    </td>

                    <td>
                        <?= htmlspecialchars($p["categoria_nombre"] ?? "—") ?>
                    </td>

                    <td>
                        <?= number_format($p["precio"], 2) ?> €
                    </td>

                    <td>

                        <?php if ($p["stock"] < 5): ?>

                            <span class="badge badge-low">
                                ⚠ <?= $p["stock"] ?>
                            </span>

                        <?php else: ?>

                            <?= $p["stock"] ?>

                        <?php endif; ?>

                    </td>

                    <td>

                        <?php if ($p["activo"]): ?>

                            <span class="badge badge-ok">
                                Activo
                            </span>

                        <?php else: ?>

                            <span class="badge badge-off">
                                Inactivo
                            </span>

                        <?php endif; ?>

                    </td>

                    <td style="font-size:12px;color:#8AABAB;">

                        <?= date(
                            "d/m/Y H:i",
                            strtotime($p["actualizado_en"])
                        ) ?>

                    </td>

                    <td>

                        <a
                            href="editar.php?id=<?= $p["id"] ?>"
                            class="btn btn-warning"
                        >
                            ✏
                        </a>

                        <a
                            href="eliminar.php?id=<?= $p["id"] ?>"
                            class="btn btn-danger"
                            onclick="return confirm('¿Eliminar este producto?')"
                        >
                            🗑
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php endif; ?>

        </tbody>

    </table>

</div>

</body>
</html>