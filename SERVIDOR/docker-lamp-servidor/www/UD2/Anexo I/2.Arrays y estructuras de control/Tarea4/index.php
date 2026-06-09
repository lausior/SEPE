<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tarea 4</title>
</head>
<body>

<?php
/*
En un string, tenemos almacenados varios datos agrupados en ciudad, país y continente. El formato es ciudad,pais,continente y cada grupo ciudad-pais-continente se separa co un ;.



Crea una aplicación PHP que imprima toda la información almacenada en el string en una tabla con 3 columnas:
*/
$informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";

$array = explode(";", $informacion);//devuelve un array (cada índice del array se separa a partir de ;)

?>

<table>
    <tr>
        <th>Ciudad</th>
        <th>País</th>
        <th>Continente</th>
    </tr>

    <?php
        foreach($array as $a){//recorremos el array que hemos dividido antes
            $clasificacion = explode(",", $a);//volvemos a dividir cada elemento del array a partir de la coma

            echo '<tr>';
                echo '<td>' . $clasificacion[0] . '</td>';
                echo '<td>' . $clasificacion[1] . '</td>';
                echo '<td>' . $clasificacion[2] . '</td>';
            echo '</tr>';
        }

    ?>
</table>
</body>
</html>