<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){

    //Extraemos los valores del formulario
    $bebida = $_GET['bebida'];
    $cantidad = $_GET['cantidad'];


    if($bebida == 'cocacola') {//$bebida recoge los datos del <select> y 'cocacola' es el valor que recoge el 'value' de <option>
        $bebida = 'Coca Cola';
        $precio = 1;
    }
    elseif ($bebida == 'pepsi') {
        $bebida = 'Pepsi Cola';
        $precio = 0.90;
    }
    elseif ($bebida == 'fanta') {
        $bebida = 'Fanta de Naranja';
        $precio = 1;
    }
    else{
        $bebida = 'Trina de Manzana';
        $precio = 1.10;
    }

    $total = $precio * $cantidad;

    echo '<p>Has pedido ' . $cantidad .  ' de ' . $bebida .  '. Precio total a pagar: ' . $total . ' €. </p>';
   }

    ?>
    <br>
    <a href="index.php">Volver atrás</a>
