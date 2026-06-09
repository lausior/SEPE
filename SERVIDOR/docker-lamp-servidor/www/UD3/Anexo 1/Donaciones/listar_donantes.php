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

  <h1>Listado de donantes</h1>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Edad</th>
      <th>Grupo Sanguíneo</th>
      <th>Código Postal</th>
      <th>Teléfono Móvil</th>
    </tr>

  <?php
      include_once('lib/database.php');

      $conPDO = conPDO();
      $lista = listar_donantes($conPDO);


      $lista->setFetchMode(PDO::FETCH_ASSOC);
      $resultado = $lista->fetchAll();
      foreach($resultado as $row) {
        echo '<tr>';
          echo '<td>' . $row['nombre'] . '</td>';
          echo '<td>' . $row['apellidos'] . '</td>';
          echo '<td>' . $row['edad'] . '</td>';
          echo '<td>' . $row['grupoSanguineo'] . '</td>';
          echo '<td>' . $row['telefonoMovil'] . '</td>';
          echo '<td>' . $row['codigoPostal'] . '</td>';
          echo '<td>' . $row['codigoPostal'] . '</td>';
          echo '<td> <a href="dar_alta_donacion.php?id=' . $row['id']. '">Donacion</a></td>';
          echo '<td><a href="listar_donaciones.php?=' . $row['id'] . '">Ver donaciones</a></td>';
          echo '<td><a href="borrar_donante.php?=' .$row['id'] . '">Borrar donante</a></td>';
          
        echo '</tr>';  
      }
  ?>
    

  </table>
  <footer>
      <p><a href='index.php'>Página de inicio</a></p>
  </footer>

  
  
</body>
</html>
