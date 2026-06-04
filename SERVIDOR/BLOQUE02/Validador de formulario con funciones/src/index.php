<?php
function validarNombre(string $nombre): string|false {
    $nombre = trim($nombre);
    if (strlen($nombre) < 2 || strlen($nombre) > 50) return false;
    if (!preg_match('/^[a-záéíóúüñA-ZÁÉÍÓÚÜÑ\s]+$/u', $nombre)) return false;
    return ucwords(strtolower($nombre));
}

function validarTelefono(string $tel): string|false {
    $tel = preg_replace('/[\s\-\.]/', '', $tel);
    if (!preg_match('/^(\+34)?[6789]\d{8}$/', $tel)) return false;
    return $tel;
}

function validarMensaje(string $msg): string|false {
    $msg = trim($msg);
    if (str_word_count($msg) < 5 || str_word_count($msg) > 500) return false;
    return htmlspecialchars($msg);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario de Contacto</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial, sans-serif;
    background:#f4f4f4;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.contenedor{
    width:400px;
    background:white;
    padding:20px;
    border-radius:8px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

label{
    display:block;
    margin-top:10px;
    margin-bottom:5px;
}

input,
textarea{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:4px;
}

button{
    width:100%;
    margin-top:15px;
    padding:10px;
    border:none;
    background:#0078d7;
    color:white;
    border-radius:4px;
    cursor:pointer;
}

button:hover{
    background:#005fa3;
}

.resultado{
    margin-top:15px;
    padding:10px;
    border-radius:4px;
}

.ok{
    background:#d4edda;
    color:#155724;
}

.error{
    background:#f8d7da;
    color:#721c24;
}
</style>
</head>
<body>

<div class="contenedor">
    <h2>Formulario de Contacto</h2>

    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" required>

        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" rows="5" required></textarea>

        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nombre = validarNombre($_POST["nombre"]);
        $telefono = validarTelefono($_POST["telefono"]);
        $mensaje = validarMensaje($_POST["mensaje"]);

        if ($nombre && $telefono && $mensaje) {
            echo '<div class="resultado ok">';
            echo "<strong>Datos válidos</strong><br>";
            echo "Nombre: $nombre<br>";
            echo "Teléfono: $telefono<br>";
            echo "Mensaje: $mensaje";
            echo '</div>';
        } else {
            echo '<div class="resultado error">';
            echo "Error: uno o más campos no son válidos.";
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>