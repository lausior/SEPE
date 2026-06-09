<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    /*DIFERENCIAS:
        *include:
            -Inserta el archivo en el punto donde se llama
            -Si el artchivo no existe muestra una advertencia(warning) y el script sigue ejecutándose
            -Suele usarse cuando el archivo no es esencial para el funcionamiento del programa

        *include_once:
            -Asegura que el archivo solo se incluya una vez, incluso si se llama varias veces
            -Evita duplicados de funciones
            -Si el archivo no existe muestra un warning y sigue ejecutando el script

        *require:
            -Inserta el archivo en el punto donde se llama de manera obligatoria
            -Si el archivo no existe muestra un error fatal(Fatal error) y detiene la ejecución del script
            -Suele usarse cuando el archivo es imprescindible
        
        *require_once:
            -Asegura que el archivo solo se incluya una vez
            -Si el archivo no existe muestra Fatal error
            -Suele usarse cuando el archivo es obligatorio y no debe cargarse dos veces



    */




    //1.Crea una función que reciba un carácter e imprima si el carácter es un dígito entre 0 y 9.
        echo '<h3>Comprobar dígito</h3>';
        function comprobarDigito($digito){
            if(!is_numeric($digito)){
                echo "El caracter no es un dígito válido. Introduce un número.";
            }
            elseif($digito >= 0 && $digito <= 9){
                echo "EL caracter está entre 0 y 9";
            }
            else{
                echo "El caracter no está entre 0 y 9";
            }
        }
        comprobarDigito("f");

        '</br></br>';

        //2.Crea una función que reciba un string y devuelva su longitud.
        echo '<h3>Longitud de cadena</h3>';
        function longitudCadena($cadena){
            $longitud = strlen($cadena);
            echo 'La cadena "' . $cadena . '" tiene ' . $longitud . ' caracteres.';
        }
        longitudCadena("Hola, qué tal");
        '</br></br>';

        //3.Crea una función que reciba dos números a y b y devuelva el número a elevado a b.
        echo '<h3>Potencia de un número:</h3>';
        function potenciaNumero($a, $b){
            $potencia = pow($a, $b);
            echo $a . ' elevado a ' . $b . ' = ' . $potencia;
        }
        potenciaNumero(2,3);

        '</br></br>';

        //4.Crea una función que reciba un carácter y devuelva true si el carácter es una vocal.
        echo '<h3>¿El caracter es una vocal?:</h3>';
        function caracterVocal($caracter){
            switch ($caracter) {
                case str_contains($caracter, "a"):
                case str_contains($caracter, "e"):
                case str_contains($caracter, "i"):
                case str_contains($caracter, "o"):
                case str_contains($caracter, "u"):
                    echo 'El caracter ' .$caracter . ' es una vocal';
                    break;
                
                default:
                    echo 'El caracter ' . $caracter . ' no es una vocal';
                    break;
            }
        }
        caracterVocal("z");
        '</br></br>';

        //5.Crea una función que reciba un número y devuelva si el número es par o impar.
        echo '<h3>¿Número par o impar?:</h3>';
        function parImpar($numero){
            if($numero % 2 == 0){
                echo 'El número ' . $numero . ' es par';
            }
            else{
                echo 'El número ' . $numero . ' es impar';
            }
        }
        parImpar(7);
        '</br></br>';

        //6.Crea una función que reciba un string y devuelva el string en maiúsculas.
        echo '<h3>Conversión a mayúsculas:</h3>';
        function conversionMay($texto){
            $conversion = mb_strtoupper($texto);
            echo $texto . ' -> ' . $conversion;
        }
        conversionMay("Me llamo Laura");
        '</br></br>';

        //7.Crea una función que imprima la zona horaria (timezone) por defecto utilizada en PHP.
        echo '<h3>Zona horaria:</h3>';
        function zonaHoraria(){
            $zonaHoraria = date_default_timezone_get();
            echo 'Zona horaria: ' . $zonaHoraria;
        }
        zonaHoraria();
        '</br></br>';

        //8.Crea una función que imprima la hora a la que sale y se pone el sol para la localicación por defecto. Debes comprobar como ajustar las coordenadas (latitud y longitud) predeterminadas de tu servidor.
        echo '<h3>Salida y puesta del sol:</h3>';
        function salidaPuestaSol($latitud, $longitud){
            $amanecer = date_sunrise(time(), SUNFUNCS_RET_STRING, $latitud, $longitud, 90, 0);
            $atardecer = date_sunset(time(), SUNFUNCS_RET_STRING, $latitud, $longitud, 90, 0);
            
            echo "El sol sale a las: $amanecer<br>";
            echo "El sol se pone a las: $atardecer<br>";
        }
        salidaPuestaSol(40.4168, -3.7038);

        //Calcular letra de DNI
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