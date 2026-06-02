<?php
// Práctica 01 — Mi ficha personal
$nombre = 'Laura'; // Cambia por tu nombre
$apellidos = 'Sierra';
$edad = 34; // Tu edad
$ciudad = 'Santiago de Compostela';
$estudia_php = true;
// Calcular año de nacimiento
$anio_nacimiento = date('Y') - $edad;
// Formatear nombre completo
$nombre_completo = ucwords(strtolower($nombre . ' ' . $apellidos));
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <title>Mi Ficha Personal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            background: #f5f5f5;
        }

        .ficha {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .campo {
            display: flex;
            margin: 12px 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
        }

        .etiqueta {
            font-weight: bold;
            color: #1A3C6E;
            width: 180px;
            flex-shrink: 0;
        }

        h1 {
            color: #1A3C6E;
            text-align: center;
        }

        .debug {
            background: #f4f6f8;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Mi Ficha Personal</h1>
    <div class='ficha'>
        <div class='campo'><span class='etiqueta'>Nombre completo:</span> <?=
                                                                            htmlspecialchars($nombre_completo) ?></div>
        <div class='campo'><span class='etiqueta'>Edad:</span> <?= $edad ?> años</div>
        <div class='campo'><span class='etiqueta'>Ciudad:</span> <?=
                                                                    htmlspecialchars($ciudad) ?></div>
        <div class='campo'><span class='etiqueta'>Año de nacimiento:</span> <?=
                                                                            $anio_nacimiento ?></div>
        <div class='campo'><span class='etiqueta'>¿Estudia PHP?</span> <?= $estudia_php ?
                                                                            '✅ Sí' : '❌ No' ?></div>
    </div>
    <div class='debug'>
        <h3>Información de depuración (var_dump):</h3>
        <pre><?php var_dump($nombre, $edad, $estudia_php); ?></pre>
    </div>
</body>

</html>