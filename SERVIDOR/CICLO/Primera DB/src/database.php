<?php

// <!-- CONEXIÓN A LA DB
function conectarDB(): PDO
{
    //Lee la configuración de la base de datos desde las variables de entorno
    $host = $_ENV['POSTGRES_HOST'] ?? 'postgres';
    $port = $_ENV['POSTGRES_PORT'] ?? '5432';
    $db   = $_ENV['POSTGRES_DB'] ?? 'db_1';
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
        //Devuelve un array asociativo
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

// INSERTAR USUARIO
function insertar_usuario(string $nombre, string $apellidos, string $dni, string $localidad, string $email): bool
{
    try {
        //Conectamos la DB llamando a la función
        $pdo = conectarDB();

        //Preparamos la consulta 
        $sql = $pdo->prepare(
            "INSERT INTO usuarios (nombre, apellidos, dni, localidad, email)
            VALUES (:nombre, :apellidos, :dni, :localidad, :email)"
        );

        //Ejecutamos la consulta con los datos recibidos
        return $sql->execute([
            ':nombre'     => $nombre,
            ':apellidos'  => $apellidos,
            ':dni'        => $dni,
            ':localidad'  => $localidad,
            ':email'      => $email
        ]);
    } catch (Exception $e) {
        throw new Exception("Error al insertar usuario: " . $e->getMessage());
    }
}

// OBTENER TODOS LOS USUARIOS
function obtener_usuarios(): array
{
    try {
        //Conectamos la DB llamando a la función
        $pdo = conectarDB();
        //Creamos la consulta para listar los usuarios, ordenados por ID descendente
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
        //Ejecutamos la consulta y guardamos el resultado en un objeto PDOStatement
        $stmt = $pdo->query($sql);
        //Recuperamos todos los registros obtenidos y los devolvemos en forma de array
        return $stmt->fetchAll();
    } catch (Exception $e) {
        throw new Exception("Error al obtener usuarios: " . $e->getMessage());
    }
}

// ACTUALIZAR USUARIO
function actualizar_usuario(int $id, string $nombre, string $apellidos, string $dni, string $localidad, string $email): bool{
    try {
        //Conectamos la DB llamando a la función
        $pdo = conectarDB();
        //Creamos la consulta para actualizar el usuario con los datos recibidos
        $sql = "UPDATE usuarios 
                SET nombre = :nombre, apellidos = :apellidos, dni = :dni, localidad = :localidad, email = :email 
                WHERE id = :id";
        //Preparamos la consulta
        $stmt = $pdo->prepare($sql);
        //Ejecutamos la consulta con los datos recibidos
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':dni' => $dni,
            ':localidad' => $localidad,
            ':email' => $email
        ]);
        
    } catch (Exception $e) {
        throw new Exception("Error al actualizar usuario: " . $e->getMessage());
    }
}

// ELIMINAR USUARIO
function eliminar_usuario(int $id): bool{
    try {
        //Conectamos la DB llamando a la función
        $pdo = conectarDB();

        //Creamos la consulta para eliminar el usuario con el ID recibido
        $sql = "DELETE FROM usuarios WHERE id = :id";

        //Preparamos la consulta
        $stmt = $pdo->prepare($sql);

        //Ejecutamos la consulta con el ID recibido
        return $stmt->execute([':id' => $id]);

    } catch (Exception $e) {
        throw new Exception("Error al eliminar usuario: " . $e->getMessage());
    }
}
