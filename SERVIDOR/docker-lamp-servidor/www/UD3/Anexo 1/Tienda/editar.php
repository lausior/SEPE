

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <div class="container">
        <h1>Editar usuario</h1>
        <p>Formulario de edición</p>

        <?php
        include_once('database.php');
        include_once('utils.php');

        $conexion = conexion();

        //1.Comprobar que el id existe y no está vacío
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];

            //2.Llamar a la función que selecciona el usuario
            $resultados = select_user($conexion, $id);

            //3.Comprobamos que haya filas
            if($resultados->num_rows > 0){
                //Metemos los datos en un array
                $row = $resultados->fetch_assoc();

                //4.Cogemos los datos del array
                $id = $row['id'];
                $nombre = $row['nombre'];
                $apellidos = $row['apellidos'];
                $edad = $row['edad'];
                $provincia = $row['provincia'];
            }
            else {
                echo "No hay resultados";
            }

        }

        //5.Cogemos los datos del formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = test_input($_POST['id']);
            $nombre = test_input($_POST['nombre']);
            $apellidos = test_input($_POST['apellidos']);
            $edad = test_input($_POST['edad']);
            $provincia = test_input($_POST['provincia']);
            
            //6.cxLlamar a la función que actualiza los datos
            update_user($conexion, $id, $nombre, $apellidos, $edad, $provincia);
        }

        ?>
        
        <form method="post" action="">
            <!-- CAMPO HIDDEN DENTRO DEL FORMULARIO -->
            <input type="hidden" name="id" value="<?php echo $id ?>"/>
            
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input name="nombre" class="form-control" value="<?php echo $nombre ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input name="apellidos" class="form-control" value="<?php echo $apellidos ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Edad</label>
                <input name="edad" type="number" class="form-control" value="<?php echo $edad ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Provincia</label>
                <input name="provincia" class="form-control" value="<?php echo $provincia ?>">
            </div>
            
            <input type="submit" name="submit" value="Modificar Usuario" class="btn btn-primary"/>
        </form>
        
        <footer class="mt-5">
            <p>
                <a href='index.php'>Página de inicio</a>
            </p>
        </footer>
    </div>
</body>
</html>