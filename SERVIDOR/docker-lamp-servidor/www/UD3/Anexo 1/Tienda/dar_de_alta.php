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

   

     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" class="mb-5">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input name= "nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Apellidos</label>
            <input name= "apellidos" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Edad</label>
            <input name= "edad" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <input name= "provincia" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php

    include_once('database.php');
    include_once('utils.php');

    $conexion = conexion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = test_input($_POST['nombre']);
        $apellidos = test_input($_POST['apellidos']);
        $edad = test_input($_POST['edad']);
        $provincia = test_input($_POST['provincia']);

        insert_user($conexion, $nombre, $apellidos, $edad, $provincia);
    }

    
    ?>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
