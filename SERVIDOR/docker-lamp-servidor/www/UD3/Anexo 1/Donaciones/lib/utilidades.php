<?php
//FILTRAR DATOS
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//FILTRAR EDAD
function edad($edad){
    if($edad < 18){
        echo 'Tienes que ser mayor de edad';
    }
}
?>