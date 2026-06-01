<?php
$resultado = null;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
    $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_FLOAT);
    if ($peso === false || $altura === false || $peso <= 0 || $altura <= 0) {
        $error = 'Por favor, introduce valores válidos y positivos.';
    } else {
        $imc = $peso / ($altura * $altura);
        $imc_redondeado = round($imc, 2);
        if ($imc < 18.5) {
            $clasificacion = 'Bajo peso';
            $color = '#3498db';
        } elseif ($imc < 25) {
            $clasificacion = 'Peso normal';
            $color = '#27ae60';
        } elseif ($imc < 30) {
            $clasificacion = 'Sobrepeso';
            $color = '#f39c12';
        } else {
            $clasificacion = 'Obesidad';
            $color = '#e74c3c';
        }
        $resultado = compact(
            'imc_redondeado',
            'clasificacion',
            'color',
            'peso',
            'altura'
        );
    }
}
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <title>Calculadora IMC</title>
    <style>
        body {
            font-family: Arial;
            max-width: 500px;
            margin: 40px auto;
        }

        input,
        button {
            padding: 8px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background: #1A3C6E;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .resultado {
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            text-align:
                center;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Calculadora de IMC</h1>
    <form method='POST'>
        <label>Peso (kg): <input type='number' name='peso' step='0.1' min='1' max='300'
                value='<?= htmlspecialchars($_POST['peso'] ?? '') ?>' required></label>
        <label>Altura (m): <input type='number' name='altura' step='0.01' min='0.5'
                max='2.5'
                value='<?= htmlspecialchars($_POST['altura'] ?? '') ?>' required></label>
        <button type='submit'>Calcular IMC</button>
    </form>
    <?php if ($error): ?>
        <p class='error'><?= htmlspecialchars($error) ?></p>
    <?php elseif ($resultado): ?>
        <div class='resultado' style='background:<?= $resultado['color'] ?>22;border:2px
solid <?= $resultado['color'] ?>'>
            <h2>IMC: <strong style='color:<?= $resultado['color'] ?>'><?=
                                                                        $resultado['imc_redondeado'] ?></strong></h2>
            <p>Clasificación: <strong><?= $resultado['clasificacion'] ?></strong></p>
            <p>Peso: <?= $resultado['peso'] ?> kg | Altura: <?= $resultado['altura'] ?> m</p>
        </div>
    <?php endif; ?>
</body>

</html>