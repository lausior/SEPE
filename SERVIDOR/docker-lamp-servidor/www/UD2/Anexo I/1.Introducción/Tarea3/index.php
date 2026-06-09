
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3</title>
</head>
<body>
    <!--
    Busca en la documentación de PHP las funciones de manejo de variables

    Comprueba el resultado devuelto por los siguientes fragmentos de código:

    - $a = “true”; // imprime el valor devuelto por is_bool($a)...
    - $b = 0; // imprime el valor devuelto por is_bool($b)...; y se entra dentro de if($b) {...}
    - $c = “false”; // imprime el valor devuelto por gettype($c);
    - $d = “”; // el valor devuelto por empty($d);
    - $e = 0.0; // el valor devuelto por empty($e);
    - $f = 0; // el valor devuelto por empty($f);
    - $g = false; // el valor devuelto por empty($g);
    - $h; // el valor devuelto por empty($h);
    - $i = “0”; // el valor devuelto por empty($i);
    - $j = “0.0”; // el valor devuelto por empty($j);
    - $k = true; // el valor devuelto por isset($k);
    - $l = false; // el valor devuelto por isset($l);
    - $m = true; // el valor devuelto por is_numeric($m);
    - $n = “”; // el valor devuelto por is_numeric($n);

    * is_bool() → comprueba si una variable es booleana.
    * gettype() → devuelve el tipo de dato.
    * empty() → devuelve true si la variable está vacía o no definida.
    * isset() → devuelve true si la variable está definida y no es null.
    * is_numeric() → devuelve true si la variable es un número o una cadena numérica.
    -->

    <?php
       $a = "true";// imprime el valor devuelto por is_bool($a)..
       echo 'is_bool("true") -> ';
       var_dump(is_bool($a));//false ("true" es un String, no un booleano)
       echo '</br>';

       $b = 0; // imprime el valor devuelto por is_bool($b)...; y se entra dentro de if($b) {...}
       echo 'is_bool(0) ->';
       var_dump(is_bool($b));//false (php evalúa 0 como falso)
       echo '</br>';

       $c = "false"; // imprime el valor devuelto por gettype($c);
       echo 'gettytype("false") ->';
       var_dump(gettype($c));//String ("false" es un String)
       echo '</br>';

       $d = ""; // el valor devuelto por empty($d);
       echo 'empty("") -> ';
       var_dump(empty($d));//true (cadena vacía = true)
       echo '</br>';

       $e = 0.0; // el valor devuelto por empty($e);
       echo 'empty(0.0) ->';
       var_dump(empty($e));//true (0.0 se considera vacío)
       echo '</br>';

       $f = 0; // el valor devuelto por empty($f);
       echo 'empty(0) ->';
       var_dump(empty($f));//true (0 se considera vacío)
       echo '</br>';

       $g = false; // el valor devuelto por empty($g);
       echo 'empty(false) ->';
       var_dump(empty($g));// false (false se considera vacío)
       echo '</br>';

       $h; // el valor devuelto por empty($h);
       echo 'empty() ->';
       var_dump(empty($h));//true (no genera error si la variable no está definida, la considera vacía)
       echo '</br>';

       $i = "0"; // el valor devuelto por empty($i);
       echo 'empty("0") ->';
       var_dump(empty($i));//true (el String "0" se considera vacío)
       echo '</br>';
       
       $j = "0.0";// el valor devuelto por empty($j);
       echo 'empty("0.0") ->';
       var_dump(empty($j));//false (el String "0.0" no se considera una cadena vacía)
       echo '</br>';
       
       $k = true; // el valor devuelto por isset($k);
       echo 'isset(true)->';
       var_dump(isset($k));//true (la variable está definida y no es null)
       echo '</br>';
       
       $l = false; // el valor devuelto por isset($l);
       echo 'isset(false) ->';
       var_dump(isset($l));//true (la variable está definida y no es null)
       echo '</br>';
        
       $m = true; // el valor devuelto por is_numeric($m);
       echo 'is_numeric(true) ->';
       var_dump(is_numeric($m));//false (true no es un número)
       echo '</br>';
       
       $n = ""; // el valor devuelto por is_numeric($n);
       echo 'is_numeric("") ->';
       var_dump(is_numeric($n));//false (una cadena vacía no es un número)
       echo '</br>';
    ?>
    

</body>
</html> 