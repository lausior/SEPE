<?php
//CONEXION
function conexion(){
    $servername = 'db';
    $username = 'root';
    $password = 'test';
    $dbname = 'tareas';

    try {
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //  Forzar excepciones
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conexión correcta';
    } 
    catch(PDOException $e) {
        echo 'Fallo en conexión: ' . $e->getMessage();
    }
    return $conexion;
}

//DESCONEXION
function desconexion($conexion){
    $conexion = null;
}

//REGISTRAR USUARIO
function registrar_usuario($conexion, $username, $nombre, $apellidos, $contraseña){
    $stmt = $conPDO->prepare("INSERT INTO usuarios (username, nombre, apellidos, contraseña) 
                              VALUES (:username, :nombre, :apellidos, :contraseña)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':contraseña', $contraseña);

    $stmt->execute();
    
    echo 'Los datos fueron insertados <br>';
}



?>