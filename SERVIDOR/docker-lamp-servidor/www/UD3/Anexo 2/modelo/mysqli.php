<?php

//CONEXION DB
function conexion(){
    try{
        $conexion = new mysqli('db', 'root', 'test', 'tareas');
        $error = $conexion->connect_errno;
        if($error !=null){
            die('Fallo en la conexión: ' . $conexion->connect_error . ', con numero ' . $error . '.<br>');
        }
    }
    catch(PDOException $e) {
        echo 'Fallo en conexión: ' . $e->getMessage();
    } 
    return $conexion;  
}


//DESCONEXION
function desconexion($conexion){
    $conexion->close();
}


//CREAR DB
function crear_db(){
    try {
    $conexion = new mysqli('db', 'root', 'test');
    echo 'Conexión correcta<br>';

    //3. Crear base de datos
    $sql = 'CREATE DATABASE IF NOT EXISTS tareas';
    if ($conexion->query($sql)) {
        echo 'Base de datos creada correctamente <br>';
    }
    else {
        echo 'Error creando la base de datos: ' . $conexion->error . '<br>';
    }
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
}

//CREAR TABLA USUARIOS
function tabla_usuarios($conexion){
    try {
        //Consulta
        $sql = "CREATE TABLE IF NOT EXISTS usuarios(
                id INT(6) AUTO_INCREMENT PRIMARY KEY, 
                username VARCHAR(50) NOT NULL, 
                nombre VARCHAR(50) NOT NULL,
                apellidos VARCHAR(100),
                contraseña VARCHAR(100))";
        if ($conexion->query($sql)) {
            echo 'Tabla creada correctamente <br>';
        }
        else {
            echo 'Error creando la tabla' . $conexion->error . '<br>';
        }
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
}

//CREAR TABLA TAREAS
function tabla_tareas($conexion){
    try {
        $sql = "CREATE TABLE IF NOT EXISTS tareas(
                id INT(6) AUTO_INCREMENT PRIMARY KEY, 
                titulo VARCHAR(50) NOT NULL, 
                descripcion VARCHAR(250) NOT NULL,
                estado VARCHAR(50),
                id_usuario INT(6),
                FOREIGN KEY(id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE)";

        if ($conexion->query($sql)) {
            echo 'Tabla creada correctamente <br>';
        }
        else {
            echo 'Error creando la tabla' . $conexion->error . '<br>';
        }
    }
    catch (mysqli_sql_exception $e) {
        //2. Gestionar el error si hubiera
        echo 'Error en la conexión: ' . $e->getMessage() . '<br>';
    }
}

//LISTAR TAREAS


//REGISTRAR TAREAS
function registrar_tareas($conexion, $titulo, $descripcion, $estado, $id_usuario){
    //Consulta
    $stmt = $conexion->prepare("INSERT INTO tareas (titulo, descripcion, estado) 
    VALUES (?,?,?,?)");
    $stmt->bind_param("sssi", $titulo, $descripcion, $estado, $id_usuario);
    $stmt->execute(); 

    echo 'Nuevos registros creados correctamente<br>';
}

//EDITAR TAREAS

//BORRAR TAREAS







?>