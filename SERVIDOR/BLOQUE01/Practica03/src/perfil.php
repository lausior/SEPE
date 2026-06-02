<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de <?= htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8') ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 20px auto; padding: 0 16px; }
        .perfil { display: grid; grid-template-columns: 140px 1fr; gap: 18px; align-items: start; }
        .perfil img { width: 140px; height: 140px; object-fit: cover; border-radius: 12px; border: 1px solid #ccc; }
        dt { font-weight: 700; margin-top: 12px; }
        dd { margin: 4px 0 0 0; }
        .actions { margin-top: 20px; }
        .button { display: inline-block; padding: 10px 16px; background: #0366d6; color: #fff; text-decoration: none; border-radius: 6px; }
    </style>
</head>
<body>
    <h1>Perfil de usuario</h1>
    <div class="perfil">
        <?php if ($usuario['avatar'] && file_exists(__DIR__ . '/' . $usuario['avatar'])): ?>
            <img src="<?= htmlspecialchars($usuario['avatar'], ENT_QUOTES, 'UTF-8') ?>" alt="Avatar de <?= htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8') ?>">
        <?php else: ?>
            <div style="width:140px;height:140px;background:#f0f0f0;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#666;">Sin avatar</div>
        <?php endif; ?>

        <div>
            <dl>
                <dt>Nombre</dt>
                <dd><?= htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8') ?></dd>

                <dt>Correo</dt>
                <dd><?= htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8') ?></dd>

                <dt>Slug</dt>
                <dd><?= htmlspecialchars($usuario['slug'], ENT_QUOTES, 'UTF-8') ?></dd>

                <dt>Edad</dt>
                <dd><?= htmlspecialchars($usuario['edad'], ENT_QUOTES, 'UTF-8') ?> años</dd>

                <dt>Fecha de nacimiento</dt>
                <dd><?= htmlspecialchars($usuario['fecha_nacimiento'], ENT_QUOTES, 'UTF-8') ?></dd>
            </dl>
        </div>
    </div>

    <div class="actions">
        <a class="button" href="index.php">Volver al formulario</a>
    </div>
</body>
</html>
