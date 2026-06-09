<?php

//CONEXIÓN A LA DB CON PDO
$servername = 'db';
$username = 'root';
$password = 'test';
$dbname = 'DB DE PRUEBA';

try {
    $conPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //  Forzar excepciones
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conexión correcta';
} catch (PDOException $e) {
    echo 'Fallo en conexión: ' . $e->getMessage();
}
//3. Cierre de conexión
$conPDO = null;



//CREACIÓN DE LA DB
//$servername = "db";
$username = "root";
$password = "test";

try {
    //1. Crear la conexión
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conexión PDO correcta<br>';
    $sql = 'CREATE DATABASE myDBPDO';
    // Se usa exec() porque no devuelve resultados
    $conn->exec($sql);
    echo 'Base de datos creada correctamente<br>';
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage() . '<br>';
}
finally {
    //4. Cerrar la conexión
    $conn = null;
    echo 'Conexión cerrada';
}
