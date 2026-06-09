<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 1</title>
</head>
<body>
    <?php
    /*
    Crea un formulario que solicite nombre y apellido.

    Cuando se reciben los datos, se debe mostrar la siguiente información:

    Nombre: xxxxxxxxx
    Apellidos: xxxxxxxxx
    Nombre y apellidos: xxxxxxxxxxxx xxxxxxxxxxxx
    Su nombre tiene caracteres X.
    Los 3 primeros caracteres de tu nombre son: xxx
    La letra A fue encontrada en sus apellidos en la posición: X
    Su nombre contiene X caracteres “A”.
    Tu nombre en mayúsculas es: XXXXXXXXX
    Sus apellidos en minúsculas son: xxxxxx
    Su nombre y apellido en mayúsculas: XXXXXX XXXXXXXXXX
    Tu nombre escrito al revés es: xxxxxx

    */

    ?>
    <!--FORMULARIO-->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="apellidos">Apellidos: </label>
        <input type="text" id="apellidos" name="apellidos" required>
        <br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php

    //Función test_input para limpiar y validar los datos del formulario
        function test_input($data){
            $data = trim($data);//quita espacios, saltos de linea y tabulaciones
            $data = stripslashes($data);//quita barras invertidas
            $data = htmlspecialchars($data);//gestiona los caracteres especiales de html
            return $data;
        }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Extraemos los datos del formulario a partir del atributo 'name' y aplicamos la función test_input()
        $nombre = test_input($_POST['nombre']);
        $apellidos = test_input($_POST['apellidos']); 

        //Nº de caracteres de nombre
        $longitud = strlen($nombre);

        //Extraer los tres primeros caracteres
        $caracteres = substr($nombre, 0, 3);

        //Buscar la posición del cacacter "a"
        $posicion = stripos($apellidos, "a");
        $posicion = ($posicion !== false) ? $posicion + 1 : 'No hay ningún caracter "a"';

        //Número de caracteres "a"
        $numCaracteres = substr_count(strtolower($apellidos), "a");

        //Convertir a mayúscula
        $apellidoMay = mb_strtoupper($apellidos);
        $nombreMay = mb_strtoupper($nombre);

        //Convertir a minúscula
        $apellidoMin = mb_strtolower($apellidos);

        //Invertir nombre
        $invertido = strrev($nombre);
        

        //Imprimimos el resultado
        echo '<p>Nombre: ' . $nombre . '</p>';
        echo '<p>Apellidos: ' . $apellidos . '</p>';
        echo '<p>Nombre y apellidos: ' . $nombre . ' ' . $apellidos . '</p>';
        echo '<p>Tu nombre tiene ' . $longitud . ' caracteres </p>';
        echo '<p>Los tres primeros caracteres de tu nombre son: ' . $caracteres . '</p>';
        echo '<p>La letra "A" fue encontrada en tus apellidos en la posición: ' . $posicion . '</p>';
        echo '<p>Tu nombre contiene ' . $numCaracteres . ' caracteres "A".</p>';
        echo '<p>Tus apellidos en mayúsculas son: ' . $apellidoMay . '</p>';
        echo '<p>Tus apellidos en minúscula son: ' . $apellidoMin . '</p>';
        echo '<p>Tu nombre y apellidos en mayúsculas son: ' . $nombreMay . ' ' . $apellidoMay . '</p>';
        echo '<p>Tu nombre escrito al revés es: ' . $invertido . '</p>';
    }
    
    ?>
    
</body>
</html>