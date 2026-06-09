<?php
//INCLUIMOS EL ARCHIVO CON LAS FUNCIONES
include 'funciones.php';
// define variables and set to empty values
$name = $email = $gender = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["nombre"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $gender = test_input($_POST["genero"]);
}


?>