<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 1</title>
</head>
<body>
 
<?php
//1.Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea.

//Array
$numPar = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20];
echo("NÚMEROS PARES : </br>");

//Bucle que reccorre el array
for($i=0; $i<count($numPar); $i++){
    echo($numPar[$i] . '</br>');
}

//2.Imprime los valores del array asociativo siguiente usando un foreach:

//Array
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';

echo('ARRAY ASOCIATIVO: </br>');

//Bucle
foreach($v as $datos => $valor){
    echo $datos . ' = ' . $valor . '</br>';
}


?>
</body>
</html>