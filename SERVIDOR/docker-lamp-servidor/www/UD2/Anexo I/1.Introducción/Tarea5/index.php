<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 5</title>
</head>
<body>

    <?php
        /*
        Escribe un programa que pase de grados Fahrenheit a Celsius. Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, se multiplica por 5 y se divide entre 9. Declara en una variable el valor inicial de los grados y en otra el final.
        */
        $fahrenheit = 100;
        $celsius = ($fahrenheit - 32) * 5 / 9;
        echo('TEMPERATURAS: </br>');
        echo("Temperatura Fahrenheit: " . $fahrenheit . '</br>');
        echo('Temperatura Celsius: ' . $celsius . '</br>');

        /*
        Crea un programa en PHP que declare e inicialice dos variables x e y con los valores 20 y 10 respectivamente y muestre la suma, la resta, la multiplicación, la división y el módulo de ambas variables. (Optativo) Haz dos versiones de este ejercicios.
        Guarda los resultados en nuevas variables.
        Sin utilizar variables intermedias.
        */
        $x = 20;
        $y = 10;

        //Con nuevas variables
        $suma = $x + $y;
        $resta = $x - $y;
        $multiplicación = $x * $y;
        $division = $x / $y;
        $modulo = $x % $y;

        echo('OPERACIONES CON NUEVAS VARIABLES </br>');
        echo('Suma = ' . $suma . '</br>');
        echo('Resta = '. $resta. '</br>');
        echo('Multiplicación = ' . $multiplicación . '</br>');
        echo('División = ' . $division . '</br>');
        echo('Módulo = ' . $modulo. '</br>');

        //Sin nuevas variables
        echo('OPERACIONES SIN NUEVAS VARIABLES </br>');
        echo('Suma = ' . $x + $y . '</br>');
        echo('Resta = ' . $x - $y . '</br>');
        echo('Multiplicación = ' . $x * $y . '</br>');
        echo('División = ' . $x / $y . '</br>');
        echo('Módulo = ' . $x % $y . '</br>');

        
        //Escribe un programa que imprima por pantalla los cuadrados de los 30 primeros números naturales.
        echo('POTENCIAS: </br>');
        $num = 1;
        do{
            $potencia = pow($num, 2);
            echo('Cuadrado de ' . $num . ' = ' . $potencia . '</br>');
            $num++;
        }
        while($num <= 30);


        /*
        Haz un programa php que calcule el área y el perímetro de un rectángulo (área=base*altura) y (perímetro=2*base+2*altura). Debes declarar las variables base=20 y altura=10.
        */
        echo('ÁREA Y PERÍMETRO DE UN RECTÁNGULO </br>');
        $base = 20;
        $altura = 10;

        $area = $base * $altura;
        $perimetro = (2*$base) + (2*$altura);

        echo('Área = ' . $area . '</br>');
        echo('Perímetro = ' . $perimetro . '</br>');
    ?>

    
    
</body>
</html>