<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora IMC</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Calculadora de IMC</h1>

<form method="POST">
    <label>Peso (kg):
        <input type="number" name="peso" step="0.1" required>
    </label>

    <label>Altura (m):
        <input type="number" name="altura" step="0.01" required>
    </label>

    <button type="submit">Calcular IMC</button>
</form>

<?php if ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<?php if ($resultado): ?>
    <div style="background:<?= $resultado['color'] ?>22; border:2px solid <?= $resultado['color'] ?>">

        <h2>
            IMC:
            <strong style="color:<?= $resultado['color'] ?>">
                <?= $resultado['imc_redondeado'] ?>
            </strong>
        </h2>

        <p>Clasificación: <strong><?= $resultado['clasificacion'] ?></strong></p>
        <p>Peso: <?= $resultado['peso'] ?> kg | Altura: <?= $resultado['altura'] ?> m</p>

    </div>
<?php endif; ?>

</body>
</html>