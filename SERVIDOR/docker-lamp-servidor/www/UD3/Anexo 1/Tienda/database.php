<?php

//CONEXIÓN
function conexion(){
$conexion = new mysqli('db', 'root', 'test', 'tienda');
$error = $conexion->connect_errno;
if($error = null){
    die('Fallo en la conexión: ' . $conexion->connect_error . ', con numero ' . $error . '.<br>');
}
return $conexion;
}

//DESCONEXIÓN
function desconexion($conexion){
    $conexion->close();
}

//CREAR DB
function create_db(){
    try {
        $conexion = new mysqli('db', 'root', 'test');
        $sql = "CREATE DATABASE IF NOT EXISTS tienda";
        $resultado = $conexion->query($sql);
        if (!$resultado) {
            echo 'Error creando la base de datos: ' . $conexion->error . '<br>';
        }
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    } 
}

//CREAR TABLA
function create_table($conexion){
    try {
       $sql = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL, 
        apellidos VARCHAR(100) NOT NULL,
        edad INT(50),
        provincia VARCHAR(100))";

        $resultado = $conexion->query($sql);

        if(!$resultado){
            echo 'Error creando la tabla' . $conexion->error . '<br>';
        }
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
}

//INSERTAR USUARIOS
function insert_user($conexion, $nombre, $apellidos, $edad, $provincia){
    try {
        $sql = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia) 
                                   VALUES (?,?,?,?)");
        $sql->bind_param("ssis", $nombre, $apellidos, $edad, $provincia);

        $resultado = $sql->execute(); 
        if($resultado){
            echo 'Usuario guardado<br>';
        }
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
}

//LISTAR USUARIOS
function list_user($conexion){
     try {
        $sql = "SELECT id, nombre, apellidos, edad, provincia
                 FROM usuarios";
        $resultado = $conexion->query($sql);
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
    return $resultado;
}

//BORRAR USUARIO
function delete_user($conexion, $id){
    try {
        $sql = "DELETE FROM usuarios 
                WHERE id=$id";
        $resultado = $conexion->query($sql);
        if ($resultado) {
            echo "Eliminado correctamente<br>";
        }
        else {
            echo "Error eliminando : " . $conexion->error;
        }
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
}

//SELECCIONAR USUARIO
function select_user($conexion, $id){
    try {
        $sql = "SELECT id, nombre, apellidos, edad, provincia
                 FROM usuarios
                 WHERE id = $id";
        $resultado = $conexion->query($sql);
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
    return $resultado;
}

//ACTUALIZAR USUARIO
function update_user($conexion, $id, $nombre, $apellidos, $edad, $provincia){
    try {
        //1.Consulta
        $sql= $conexion->prepare("UPDATE usuarios 
                                SET nombre=?, apellidos=?, edad=?, provincia=?
                                WHERE id=?");
        //2.Asignar valores
        $sql->bind_param("ssisi", $nombre, $apellidos, $edad, $provincia, $id);
        //3.Ejecutar
        $resultado = $sql->execute();
        //Comprobar
        if($resultado){
            echo 'Datos actualizados';
        }
        else{
            echo 'Error al actualizar los datos';
        }
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
    return $resultado;
}
    

?>