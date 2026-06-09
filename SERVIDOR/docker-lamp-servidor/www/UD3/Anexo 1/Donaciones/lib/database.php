<?php
//CONEXIÓN
function conPDO(){
    //Variables
    $servername = 'db';
    $username = 'root';
    $password = 'test';
    $dbname = 'donacion';

    try {
        //Establecer conexion
        $conPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //Excepciones
        $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conexión correcta <br>';
        return $conPDO;
    } 
    catch (PDOException $e) {
        echo 'Fallo en la conexión <br>';
    }
    
}

//DESCONEXIÓN
function desconexion($conPDO){
    return null;
}

//CREAR DB
function create_db(){
    //Variables
    $servername = 'db';
    $username = 'root';
    $password = 'test';

    try {
        //Crear la conexión 
        $conPDO = new PDO("mysql:host=$servername", $username, $password);
        //Excepciones
        $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conexión PDO correcta<br>';
        //Consulta
        $sql = "CREATE DATABASE IF NOT EXISTS donacion";
        //Se usa exec() porque no devuelve resultados
        $conPDO->exec($sql);
        echo 'Base de datos creada correctamente<br>';
        return $conPDO;
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage() . '<br>';
        return null;
    }
}

//TABLA DONANTES
function tabla_donantes($conPDO){
    $sql = "CREATE TABLE IF NOT EXISTS donantes(
            id INT(6) AUTO_INCREMENT PRIMARY KEY, 
            nombre VARCHAR(30) NOT NULL,
            apellidos VARCHAR(60) NOT NULL, 
            edad INT(3) NOT NULL,
            grupoSanguineo VARCHAR(3) NOT NULL,
            codigoPostal INT(5) NOT NULL,
            telefonoMovil INT(9) NOT NULL)";
    $conPDO->exec("USE donacion");
    $resultado = $conPDO->exec($sql);
    echo 'Tabla Donantes creada correctamente <br>';
}

//TABLA HISTORICO
function tabla_historico($conPDO){
    $sql = "CREATE TABLE IF NOT EXISTS historico(
            idDonante INT(6) NOT NULL,
            fechaDonacion DATE NOT NULL, 
            proximaDonacion DATE NOT NULL, 
            PRIMARY KEY (idDonante, fechaDonacion),
            FOREIGN KEY (idDonante) REFERENCES donantes(id) ON DELETE CASCADE)";
    $conPDO->exec("USE donacion");
    $resultado = $conPDO->exec($sql);
    echo 'Tabla Histórico creada correctamente <br>';
}


//TABLA ADMINISTRADORES
function tabla_administradores($conPDO){
    $sql = "CREATE TABLE IF NOT EXISTS administradores(
            nombre VARCHAR(50) PRIMARY KEY, 
            contrasena VARCHAR(200) NOT NULL)";
    $conPDO->exec("USE donacion");
    $resultado = $conPDO->exec($sql);
    echo 'Tabla Administradores creada correctamente <br>';
}

//REGISTRAR DONANTE
function registrar_donante($conPDO, $nombre, $apellidos, $edad, $grupoSanguineo, $telefonoMovil, $codigoPostal){
    $sql = $conPDO->prepare("INSERT INTO donantes(nombre, apellidos, edad, grupoSanguineo, telefonoMovil, codigoPostal)
                            VALUES(:nombre, :apellidos, :edad, :grupoSanguineo, :telefonoMovil, :codigoPostal)");
    $sql->bindParam(':nombre', $nombre);
    $sql->bindParam(':apellidos', $apellidos);
    $sql->bindParam(':edad', $edad);
    $sql->bindParam(':grupoSanguineo', $grupoSanguineo);
    $sql->bindParam(':telefonoMovil', $telefonoMovil);
    $sql->bindParam(':codigoPostal', $codigoPostal);
    $resultado = $sql->execute();
}


//LISTAR DONANTES
function listar_donantes($conPDO){
    $sql = $conPDO->prepare("SELECT id, nombre, apellidos, edad, grupoSanguineo, telefonoMovil, codigoPostal
                             FROM donantes");
    $sql->execute();
    return $sql;
}

//SELECCIONAR DONANTES
function seleccionar_donante($conPDO, $id){
    $sql =  $conPDO->prepare("SELECT id, nombre, apellidos, edad, grupoSanguineo, codigoPostal, telefonoMovil
                             FROM donantes");
    $sql->execute();
    return $sql;
}

//REGISTRAR DONACION
function registrar_donacion($conPDO, $idDonante, $fechaDonacion){
    $ultima_donacion = get_ultima_donacion($conexion, $idDonante);

    if (!$ultima_donacion || ($ultima_donacion <  $fechaDonacion)) {
        $fechaProximaDonacion = date("Y-m-d", strtotime($fechaDonacion . "+4 month"));
        $sql = $conPDO->prepare("INSERT INTO historico (idDonante,fechaDonacion,proximaDonacion) 
                               VALUES (:idDonante,:fechaDonacion,:proximaDonacion)");
        $sql->bindParam(":idDonante", $idDonante);
        $sql->bindParam(":fechaDonacion", $fechaDonacion);
        $sql->bindParam(":proximaDonacion", $fechaProximaDonacion);
        $sql->execute();
        return true;
    } else {
        return false;
    }
}

//ULTIMA DONACION
function get_ultima_donacion($conexion, $idDonante)
{
    $proxima_donacion = null;
    $consulta = $conexion->prepare("SELECT d.nombre, d.apellidos, h.fechaDonacion, h.proximaDonacion 
                                        FROM donantes as d 
                                        INNER JOIN historico as h 
                                        ON d.id=h.idDonante AND d.id=$idDonante 
                                        ORDER BY h.fechaDonacion DESC LIMIT 1");
    $consulta->execute();
    while ($fila = $consulta->fetch()) {
        $proxima_donacion = $fila['proximaDonacion'];
    }

    return $proxima_donacion;
}

//SELECCIONAR DONACION
function get_donaciones($conexion, $idDonante)
{
    $consulta = $conexion->prepare("SELECT d.nombre, d.apellidos, h.fechaDonacion, h.proximaDonacion 
                                        FROM donantes as d 
                                        INNER JOIN historico as h 
                                        ON d.id=h.idDonante AND d.id=$idDonante 
                                        ORDER BY h.fechaDonacion DESC");
    $consulta->execute();
    return $consulta;
}



?>