<?php

// ======================================================
// DATOS DEL ALUMNADO
// ======================================================

$alumnado = [
    ['nombre' => 'Ana García', 'notas' => [8.5, 7.0, 9.2, 6.8, 8.0]],
    ['nombre' => 'Carlos López', 'notas' => [5.5, 6.0, 4.8, 7.5, 6.2]],
    ['nombre' => 'María Pérez', 'notas' => [9.5, 9.0, 8.8, 9.2, 9.7]],
    ['nombre' => 'Juan Martín', 'notas' => [3.5, 4.0, 5.2, 4.8, 3.9]],
    ['nombre' => 'Laura Ruiz', 'notas' => [7.0, 7.5, 6.8, 8.0, 7.2]],
];

// Materias
$materias = ['PHP', 'MySQL', 'HTML/CSS', 'JavaScript', 'Git'];

// ======================================================
// FUNCIONES
// ======================================================

/**
 * Calcula la media de un conjunto de notas.
 */
function mediaNotas(array $notas): float
{
    return round(array_sum($notas) / count($notas), 2);
}

/**
 * Devuelve la clasificación según la media.
 */
function clasificacion(float $media): string
{
    return match (true) {
        $media >= 9 => 'Sobresaliente',
        $media >= 7 => 'Notable',
        $media >= 5 => 'Aprobado',
        default => 'Suspenso',
    };
}

// ======================================================
// CÁLCULO DE MEDIAS Y CLASIFICACIONES
// ======================================================

foreach ($alumnado as &$alumno) {
    $alumno['media'] = mediaNotas($alumno['notas']);
    $alumno['clasificacion'] = clasificacion($alumno['media']);
}

unset($alumno);

// ======================================================
// ORDENAR POR MEDIA DESCENDENTE
// ======================================================

usort(
    $alumnado,
    fn($a, $b) => $b['media'] <=> $a['media']
);

// ======================================================
// EXPORTAR CSV
// ======================================================

if (isset($_GET['export']) && $_GET['export'] === 'csv') {

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=notas.csv');

    $handle = fopen('php://output', 'w');

    // Cabecera
    fputcsv(
        $handle,
        array_merge(
            ['Nombre', 'Media', 'Clasificación'],
            $materias
        )
    );

    // Datos
    foreach ($alumnado as $a) {
        fputcsv(
            $handle,
            array_merge(
                [$a['nombre'], $a['media'], $a['clasificacion']],
                $a['notas']
            )
        );
    }

    fclose($handle);
    exit;
}

// ======================================================
// ESTADÍSTICAS POR MATERIA
// ======================================================

$estadisticas = [];

foreach ($materias as $indice => $materia) {

    $notasMateria = [];

    foreach ($alumnado as $alumno) {
        $notasMateria[] = $alumno['notas'][$indice];
    }

    $estadisticas[] = [
        'materia' => $materia,
        'media' => round(array_sum($notasMateria) / count($notasMateria), 2),
        'maxima' => max($notasMateria),
        'minima' => min($notasMateria)
    ];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Académico</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }

        h1,
        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #e9ecef;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>

<body>

    <h1>Informe Académico</h1>

    <a class="btn" href="?export=csv">Exportar CSV</a>

    <!-- TABLA DE NOTAS -->
    <h2>Tabla de Notas</h2>

    <table>
        <thead>
            <tr>
                <th>Alumno</th>

                <?php foreach ($materias as $materia): ?>
                    <th><?= htmlspecialchars($materia, ENT_QUOTES, 'UTF-8') ?></th>
                <?php endforeach; ?>

                <th>Media</th>
                <th>Clasificación</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($alumnado as $alumno): ?>
                <tr>

                    <td>
                        <?= htmlspecialchars($alumno['nombre'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <?php foreach ($alumno['notas'] as $nota): ?>
                        <td><?= $nota ?></td>
                    <?php endforeach; ?>

                    <td><?= $alumno['media'] ?></td>
                    <td><?= $alumno['clasificacion'] ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- RANKING -->
    <h2>Ranking de Alumnos</h2>

    <table>
        <thead>
            <tr>
                <th>Posición</th>
                <th>Alumno</th>
                <th>Media</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($alumnado as $posicion => $alumno): ?>
                <tr>
                    <td><?= $posicion + 1 ?></td>

                    <td>
                        <?= htmlspecialchars($alumno['nombre'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <td><?= $alumno['media'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- ESTADÍSTICAS -->
    <h2>Estadísticas por Materia</h2>

    <table>
        <thead>
            <tr>
                <th>Materia</th>
                <th>Media</th>
                <th>Máxima</th>
                <th>Mínima</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($estadisticas as $estadistica): ?>
                <tr>
                    <td><?= $estadistica['materia'] ?></td>
                    <td><?= $estadistica['media'] ?></td>
                    <td><?= $estadistica['maxima'] ?></td>
                    <td><?= $estadistica['minima'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>