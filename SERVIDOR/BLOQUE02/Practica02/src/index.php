<?php
session_start();
$errores = $_SESSION['errores'] ?? [];
$old = $_SESSION['old'] ?? ['nombre' => '', 'email' => '', 'fecha_nacimiento' => ''];
unset($_SESSION['errores'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 20px auto; padding: 0 16px; }
        .error { background: #f8d7da; color: #842029; border: 1px solid #f5c2c7; padding: 12px; border-radius: 6px; margin-bottom: 16px; }
        .field { margin-bottom: 14px; }
        label { display: block; margin-bottom: 6px; font-weight: 700; }
        input, button { width: 100%; padding: 10px; box-sizing: border-box; }
        button { background: #0366d6; border: none; color: #fff; cursor: pointer; border-radius: 6px; }
        button:hover { background: #024e9e; }
    </style>
</head>
<body>
    <h1>Registro de usuario</h1>

    <?php if (!empty($errores)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="procesar.php" method="post" enctype="multipart/form-data">
        <div class="field">
            <label for="nombre">Nombre completo</label>
            <input id="nombre" name="nombre" type="text" value="<?= htmlspecialchars($old['nombre'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field">
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" value="<?= htmlspecialchars($old['email'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field">
            <label for="password">Contraseña</label>
            <input id="password" name="password" type="password" required>
        </div>

        <div class="field">
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="<?= htmlspecialchars($old['fecha_nacimiento'], ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="field">
            <label for="avatar">Avatar (jpg, png, gif, webp, < 2MB)</label>
            <input id="avatar" name="avatar" type="file" accept="image/*">
        </div>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
