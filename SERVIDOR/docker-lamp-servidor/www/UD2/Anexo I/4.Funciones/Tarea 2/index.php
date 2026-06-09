<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 2</title>
</head>
<body>
    <?php

    function comprobarDNI($dni){
        //Array con las letras del dni
        $letras=['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D','X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        $resto = $dni % 23;

        $indiceLetra = $letras[$resto];
        echo $dni . $indiceLetra; 
    }
    comprobarDNI(48640208);
    ?>
    
</body>
</html>