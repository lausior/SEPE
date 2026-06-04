<?php

function calcularIMC($peso, $altura) {

    if ($peso <= 0 || $altura <= 0) {
        return ['error' => 'Valores inválidos'];
    }

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

    return [
        'imc_redondeado' => $imc_redondeado,
        'clasificacion' => $clasificacion,
        'color' => $color,
        'peso' => $peso,
        'altura' => $altura
    ];
}
?>