
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
  <h1>Alta donante</h1>



  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Nombre: <input type="text" name="nombre" value="">
      <br><br>
      Apellidos: <input type="text" name="apellidos" value="">
      <br><br>
      Edad:  <input type="text" name="edad" value="">
      <br><br>
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Grupo sanguíneo:</label>
      <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="grupoSanguineo">
        <option value="0-">O-</option>
        <option value="0+">O+</option>
        <option value="A-">A-</option>
        <option value="A+">A+</option>
        <option value="B-">B-</option>
        <option value="B+">B+</option>
        <option value="AB-">AB-</option>
        <option value="AB+">AB+</option>
        <option value="" selected=""></option>
      </select>
      <br><br>
      Código Postal:  <input type="text" name="codigoPostal" value="">
      <br><br>
      Teléfono móvil:  <input type="text" name="telefonoMovil" value="">

      <input type="submit" name="submit" value="Submit"> 
    </form>

    <?php
      include_once('lib/database.php');
      include_once('lib/utilidades.php');

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = test_input($_POST['nombre']);
        $apellidos = test_input($_POST['apellidos']);
        $edad = test_input($_POST['edad']);
        $grupoSanguineo = test_input($_POST['grupoSanguineo']);
        $codigoPostal = test_input($_POST['codigoPostal']);
        $telefonoMovil = test_input($_POST['telefonoMovil']);

         $conPDO = conPdo();
        registrar_donante($conPDO, $nombre, $apellidos, $edad, $grupoSanguineo, $codigoPostal, $telefonoMovil);
      }
?>
  <footer>
      <p><a href='index.php'>Página de inicio</a></p>
  </footer>


</body>

</html>
