<?php

// <!-- CONEXIÓN A LA DB
function conectarDB(): PDO{
    //Lee la configuaración de la base de datos desde las variables de entorno
    $host = $_ENV['POSTGRES_HOST'] ?? 'postgres';
    $port = $_ENV['POSTGRES_PORT'] ?? '5432';
    $db   = $_ENV['POSTGRES_DB'] ?? 'listado';
    $user = $_ENV['POSTGRES_USER'] ?? 'php_user';
    $pass = $_ENV['POSTGRES_PASSWORD'] ?? '';
    //$nombreVariable = $_variable de .env['NOMBRE_VARIABLE'] ?? ' valor_por_defecto';

    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$db";
        //pgsql -> tipo de la DB
        //host=$host -> dirección del servidor
        //port=$port -> puerto de conexión  
        //dbname=$db -> nombre de la base de datos

        //Crea la conexión
        $pdo = new PDO($dsn, $user, $pass);

        //Lanza une excepción en caso de error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //evuelve un array asociativo
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //Obliga a PDO a usar consultas reales del motor de DB
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        //Devuelve la conexión establecida
       
        return $pdo;

    } 
    //Captura errores de conexión y muestra un mensaje
    catch (PDOException $e) {
        die("❌ Error de conexión a la base de datos: " . $e->getMessage());
    }
}


