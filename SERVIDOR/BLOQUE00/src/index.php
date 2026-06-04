<?php
// Práctica 01 — Mi ficha personal
$nombre = 'LAURA'; // Cambia por tu nombre
$apellidos = 'SIERRA';
$edad = 34; // Tu edad
$ciudad = 'SANTIAGO DE COMPOSTELA'; // Tu ciudad
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
    <link rel='stylesheet' href='style.css'>
</head>

<body>
    <h1>Mi Ficha Personal</h1>
    <div class='ficha'>
        <!-- NOMBRE-->
        <div class='campo'><span class='etiqueta'>Nombre completo:</span> 
        <?=htmlspecialchars($nombre_completo) ?></div>

        <!-- EDAD -->
        <div class='campo'><span class='etiqueta'>Edad:</span> 
        <?= $edad ?> años</div>

        <!-- CIUDAD -->
        <div class='campo'><span class='etiqueta'>Ciudad:</span> 
        <?=htmlspecialchars($ciudad) ?></div>

        <!-- AÑO DE NACIMIENTO -->
        <div class='campo'><span class='etiqueta'>Año de nacimiento:</span> 
        <?=$anio_nacimiento ?></div>

        <!-- ESTUDIOS -->
        <div class='campo'><span class='etiqueta'>¿Estudia PHP?</span> 
        <?= $estudia_php ?'✅ Sí' : '❌ No' ?></div>

    </div>
    <div class='debug'>
        <h3>Información de depuración (var_dump):</h3>
        <pre><?php var_dump($nombre, $edad, $estudia_php); ?></pre>
    </div>
</body>

</html>