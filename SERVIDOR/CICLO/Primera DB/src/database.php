<?php

// <!-- CONEXIÓN A LA DB
function conectarDB(): PDO{
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
function insertar_usuario(string $nombre, string $apellidos, string $dni, string $localidad, string $email): bool {
    try {
        $pdo = conectarDB();
        
        $sql = "INSERT INTO usuarios (nombre, apellidos, dni, localidad, email) 
                VALUES (:nombre, :apellidos, :dni, :localidad, :email)";
        
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':dni' => $dni,
            ':localidad' => $localidad,
            ':email' => $email
        ]);
    } catch (Exception $e) {
        throw new Exception("Error al insertar usuario: " . $e->getMessage());
    }
}

// OBTENER TODOS LOS USUARIOS
function obtener_usuarios(): array {
    try {
        $pdo = conectarDB();
        
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
        $stmt = $pdo->query($sql);
        
        return $stmt->fetchAll();
    } catch (Exception $e) {
        throw new Exception("Error al obtener usuarios: " . $e->getMessage());
    }
}

// OBTENER UN USUARIO POR ID
function obtener_usuario_por_id(int $id): array {
    try {
        $pdo = conectarDB();
        
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $usuario = $stmt->fetch();
        if (!$usuario) {
            throw new Exception("Usuario no encontrado");
        }
        
        return $usuario;
    } catch (Exception $e) {
        throw new Exception("Error al obtener usuario: " . $e->getMessage());
    }
}

// ACTUALIZAR USUARIO
function actualizar_usuario(int $id, string $nombre, string $apellidos, string $dni, string $localidad, string $email): bool {
    try {
        $pdo = conectarDB();
        
        $sql = "UPDATE usuarios 
                SET nombre = :nombre, apellidos = :apellidos, dni = :dni, 
                    localidad = :localidad, email = :email 
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        
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
function eliminar_usuario(int $id): bool {
    try {
        $pdo = conectarDB();
        
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([':id' => $id]);
    } catch (Exception $e) {
        throw new Exception("Error al eliminar usuario: " . $e->getMessage());
    }
}
