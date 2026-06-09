<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style2.css">
  <title>Document</title>
</head>

<body>

  <?php

  //INCLUIMOS EL ARCHIVO CON LAS FUNCIONES
  include 'funciones.php';

  //COMPROBAMOS QUE EL FORMULARIO SE ENVÍA CON EL MÉTODO 'POST'
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = test_input($_POST["nombre"]);
    $apellidos = test_input($_POST["apellidos"]);
    $edad = test_input($_POST["edad"]);
    $localidad = test_input($_POST["localidad"]);
    $email = test_input($_POST["email"]);
    $website = test_input($_POST["website"]);


    //IMPRIMIMOS EL RESULTADO
    echo "<div>";
    echo "<p>NOMBRE: " . $nombre . "</p>";
    echo "<p>APELLIDOS: " . $apellidos . "</p>";
    echo "<p>EDAD: " . $edad . "</p>";
    echo "<p>LOCALIDAD: " . $localidad . "</p>";
    echo "<p>EMAIL: " . $email . "</p>";
    echo "<p>WEBSITE: " . $website . "</p>";
    echo "</div>";
  }
  ?>
</body>

</html>