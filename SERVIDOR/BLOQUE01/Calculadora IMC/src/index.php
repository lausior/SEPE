<?php

require_once "modelo.php";

$resultado = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
    $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_FLOAT);

    if ($peso === false || $altura === false) {
        $error = "Introduce valores válidos";
    } else {
        $resultado = calcularIMC($peso, $altura);
    }
}

require "vista.php";
?>