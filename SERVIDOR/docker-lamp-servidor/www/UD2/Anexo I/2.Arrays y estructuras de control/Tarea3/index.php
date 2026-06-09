<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3</title>
</head>
<body>
    
<?php
//1.Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive). Uso de la función rand. Imprime la matriz creada anteriormente.
echo 'NÚMEROS RANDOM: </br>';

$array =[];//array que almacenará los números

//Bucle que genera los 30 números aleatorios
for($i=0; $i<30; $i++){
    $numRandom = rand(0,20);//variable que busca números aleatorios
    $array[] = $numRandom;//añade los números al array
    //array_push($array, $numRandom);//también se podrían añadir al array con la función 'array_push
}
//Bucle que recorre el array con los números
foreach($array as $num){
    echo $num . ' ,';
}
echo('</br>');
echo('</br>');


//2.Crea una matriz con los siguientes datos: Batman, Superman, Krusty, Bob, Mel y Barney. 
$personajes = ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];
    echo 'PERSONAJES </br>';

    echo 'Array original: ';
    foreach($personajes as $pOriginal){
        echo($pOriginal . ' , ');
    }
    echo('</br>');
    

    //Elimina la última posición de la matriz.
    echo 'Última posición borrada: ';
    array_pop($personajes);
    
    foreach($personajes as $pBorrado){
        echo $pBorrado . ' , ';
    }
    echo('</br>');

    //Imprime la posición donde se encuentra la cadena ‘Superman’.
    $arrayPosicion = in_array('Superman', $personajes);
    echo 'Posición del elemento Superman en el array: ' .$arrayPosicion;
    echo('</br>');
    
    //Agrega los siguientes elementos al final de la matriz: Carl, Lenny, Burns y Lisa.
    echo 'Array con personajes añadidos al final del array: ';
   array_push($personajes, 'Carl', 'Lenny', 'Burns', 'Lisa');
    foreach($personajes as $añadido){
        echo($añadido . ' , ');
    }
     echo('</br>');

    //Ordena los elementos de la matriz e imprima la matriz ordenada.
    echo 'Array ordenado : ';
    sort($personajes);
    foreach($personajes as $ordenado){
        echo $ordenado . ' , ';
    }
    echo('</br>');

    //Agrega los siguientes elementos al comienzo de la matriz: Apple, Melon, Watermelon.
    echo 'Elementos añadidos al principio del array: ';
    array_unshift($personajes, 'Apple', 'Melón', 'Watermelon');
    foreach($personajes as $añadido2){
        echo $añadido2 . ' , ';
    }
    echo('</br>');
    
//3.Crea una copia de la matriz con el nombre copia con elementos del 3 al 5.
    echo 'Copia del array: ';
    $arrayCopia = array_slice($personajes, 3,3);
    foreach($arrayCopia as $copia){
        echo $copia . ' , ';
    }
    echo('</br>');
    //Agrega el elemento Pera al final de la matriz.
    echo 'Elemento agregado al final del array copiado : ';
    array_push($arrayCopia, 'Pera');
    foreach($arrayCopia as $añadido3){
        echo $añadido3 . ' , ';
    }






?>
</body>
</html>