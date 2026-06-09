

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <h1>Alta donacion</h1>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Fecha: <input type="date" name="fechaDonacion">
    <input type="hidden" name="idDonante" value=""/>
    <br><br>
    <input type="submit" name="enviar" value="Enviar"> 

    <?php

      include_once('lib/database.php');
      include_once('lib/utilidades.php');

      $conPDO = conPDO();
      $resultado = registrar_donacion($conPDO, $idDonante, $fechaDonacion);

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idDonante = test_input($_POST["idDonante"]);
        $fechaDonacion = test_input($_POST["fechaDonacion"]);

        if ($resultado == true) {
          echo "Donación registrada";
        } 
        else {
            echo "No puede donar, no se han cumplido 4 meses desde su última donación";
        }
      }
?>
  </form>


  <footer>
      <p><a href='index.php'>Página de inicio</a></p>
  </footer>
</body>

</html>
