<?php

/**
 * Clase Database — Conexión PDO a PostgreSQL
 * Implementa el patrón Singleton para reutilizar la conexión.
 */
class Database
{
    private static ?PDO $instancia = null;

    /**
     * Obtener la instancia única de la conexión PDO.
     * Si no existe, la crea. Si ya existe, la reutiliza.
     */
    public static function conectar(): PDO
    {
        if (self::$instancia === null) {

            // Leer credenciales desde variables de entorno
            // (definidas en docker-compose.yml o .env)
            $host = $_ENV["POSTGRES_HOST"] ?? getenv("POSTGRES_HOST") ?? "postgres";
            $port = $_ENV["POSTGRES_PORT"] ?? getenv("POSTGRES_PORT") ?? "5432";
            $db   = $_ENV["POSTGRES_DB"] ?? getenv("POSTGRES_DB") ?? "tienda_db";
            $user = $_ENV["POSTGRES_USER"] ?? getenv("POSTGRES_USER") ?? "php_user";
            $pass = $_ENV["POSTGRES_PASSWORD"] ?? getenv("POSTGRES_PASSWORD") ?? "";

            // DSN (Data Source Name) para PostgreSQL
            // Formato: pgsql:host=HOST;port=PORT;dbname=DBNAME
            $dsn = "pgsql:host={$host};port={$port};dbname={$db}";

            try {
                self::$instancia = new PDO(
                    $dsn,
                    $user,
                    $pass,
                    [
                        // Lanzar excepciones en caso de error
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                        // Devolver resultados como arrays asociativos
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

                        // Desactivar emulación de prepared statements
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );

                // Configurar codificación UTF-8
                self::$instancia->exec("SET client_encoding TO 'UTF8'");

            } catch (PDOException $e) {

                // En producción: registrar el error sin mostrarlo
                error_log("Error de conexión BD: " . $e->getMessage());

                http_response_code(500);

                die(json_encode([
                    "error" => "Error de conexión a la base de datos"
                ]));
            }
        }

        return self::$instancia;
    }

    // Evitar instanciación y clonación (patrón Singleton)
    private function __construct() {}
    private function __clone() {}
}

/*
|--------------------------------------------------------------------------
| USO BÁSICO
|--------------------------------------------------------------------------
*/

// Obtener conexión
// $pdo = Database::conectar();

// SELECT con prepared statement
// $stmt = $pdo->prepare(
//     'SELECT * FROM productos WHERE id = :id'
// );
// $stmt->execute([':id' => 1]);
// $producto = $stmt->fetch();

// INSERT con prepared statement
// $stmt = $pdo->prepare(
//     'INSERT INTO productos (nombre, precio)
//      VALUES (:nombre, :precio)'
// );
// $stmt->execute([
//     ':nombre' => 'Nuevo producto',
//     ':precio' => 99.99
// ]);

// En PostgreSQL se recomienda usar RETURNING id
// para recuperar el identificador insertado.
?>