<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $ciudad = $_POST['ciudad'];
    $estudia_php = $_POST['estudia_php'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    echo "<h1>Mi ficha personal</h1>";

    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Edad:</strong> $edad</p>";
    echo "<p><strong>Ciudad:</strong> $ciudad</p>";
    echo "<p><strong>Año de nacimiento:</strong> $fecha_nacimiento</p>";

    echo "<p><strong>¿Estudia PHP?</strong> " . ($estudia_php == "si" ? "Sí" : "No") . "</p>";

}
?>