<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Tienda IES San Clemente</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous">
    </script>

   <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Edad</th>
        <th scope="col">Provincia</th>
        <th scope="col">Borrar</th>
        <th scope="col">Editar</th>
      </tr>

      <?php
      include_once('database.php');

      $conexion = conexion();

      $resultados = list_user($conexion);

    if($resultados->num_rows > 0){
    
      while ($row = $resultados->fetch_assoc()) {
        echo '<tr>';
          echo '<td>' . $row['nombre'] . '</td>';
          echo '<td>' . $row['apellidos'] . '</td>';
          echo '<td>' . $row['edad'] . '</td>';
          echo '<td>' . $row['provincia'] . '</td>';
          echo "<td><a href='editar.php?id={$row['id']}'>Editar</a></td>";
          echo "<td><a href='borrar.php?id={$row['id']}'>Borrar</a></td>";
        echo '</tr>';
          
      }
    }
    else {
        echo "No hay resultados";
    }
      desconexion($conexion);
      ?>

    </thead>
    <tbody>

    <?php
    
    ?>
    </tbody>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
