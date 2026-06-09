<?php

// Array principal con los alumnos
$alumnado = [
    ['nombre' => 'Ana García', 'notas' => [8.5, 7.0, 9.2, 6.8, 8.0]],
    ['nombre' => 'Carlos López', 'notas' => [5.5, 6.0, 4.8, 7.5, 6.2]],
    ['nombre' => 'María Pérez', 'notas' => [9.5, 9.0, 8.8, 9.2, 9.7]],
    ['nombre' => 'Juan Martín', 'notas' => [3.5, 4.0, 5.2, 4.8, 3.9]],
    ['nombre' => 'Laura Ruiz', 'notas' => [7.0, 7.5, 6.8, 8.0, 7.2]],
];

// Array con las materias (solo informativo en este código)
$materias = ['PHP', 'MySQL', 'HTML/CSS', 'JavaScript', 'Git'];

// Función que calcula la media de un array de notas
function mediaNotas(array $notas): float {
    // Suma todas las notas y las divide entre la cantidad
    // round(..., 2) redondea a 2 decimales
    return round(array_sum($notas) / count($notas), 2);
}

// Función que devuelve la clasificación según la media
function clasificacion(float $media): string {
    // match(true) permite evaluar condiciones como rangos
    return match(true) {
        $media >= 9 => 'Sobresaliente',
        $media >= 7 => 'Notable',
        $media >= 5 => 'Aprobado',
        default => 'Suspenso',
    };
}

// Recorremos el array de alumnos por referencia (&)
// para poder añadir nuevos campos directamente
foreach ($alumnado as &$alumno) {

    // Calculamos la media de sus notas
    $alumno['media'] = mediaNotas($alumno['notas']);

    // Asignamos la clasificación según su media
    $alumno['clasificacion'] = clasificacion($alumno['media']);
}

// Rompemos la referencia para evitar efectos secundarios
unset($alumno);

// Ordenamos el array de alumnos por media de forma descendente
// (el alumno con mayor media aparece primero)
usort($alumnado, fn($a, $b) => $b['media'] <=> $a['media']);

// Comprobamos si se ha solicitado exportación en CSV mediante URL
if (isset($_GET['export']) && $_GET['export'] === 'csv') {

    // Indicamos al navegador que el contenido es un archivo CSV
    header('Content-Type: text/csv; charset=utf-8');

    // Forzamos la descarga del archivo con nombre "notas.csv"
    header('Content-Disposition: attachment; filename=notas.csv');

    // Abrimos la salida del servidor como si fuera un archivo
    $handle = fopen('php://output', 'w');

    // Escribimos la cabecera del CSV
    fputcsv($handle, array_merge(['Nombre', 'Media', 'Clasificación'], $materias));

    // Recorremos alumnos y escribimos cada fila en el CSV
    foreach ($alumnado as $a) {
        fputcsv($handle, array_merge(
            [$a['nombre'], $a['media'], $a['clasificacion']],
            $a['notas']
        ));
    }

    // Cerramos el archivo de salida
    fclose($handle);

    // Terminamos el script para no seguir ejecutando nada más
    exit;
}



?>