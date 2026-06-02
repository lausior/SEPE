<?php
session_start();
require 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$fechaNacimiento = $_POST['fecha_nacimiento'] ?? '';

$errores = [];

if ($nombre === '') {
    $errores[] = 'El nombre es obligatorio.';
}

if ($email === '' || !validarEmail($email)) {
    $errores[] = 'El correo electrónico no es válido.';
}

if (!empty($password)) {
    $errores = array_merge($errores, validarContrasena($password));
} else {
    $errores[] = 'La contraseña es obligatoria.';
}

if ($fechaNacimiento === '') {
    $errores[] = 'La fecha de nacimiento es obligatoria.';
} else {
    try {
        new DateTime($fechaNacimiento);
    } catch (Exception $e) {
        $errores[] = 'La fecha de nacimiento no es válida.';
    }
}

$avatarNombre = null;
if (!empty($_FILES['avatar']) && $_FILES['avatar']['error'] !== UPLOAD_ERR_NO_FILE) {
    $rutaUploads = __DIR__ . '/uploads/';

    if (!is_dir($rutaUploads) && !mkdir($rutaUploads, 0755, true)) {
        $errores[] = 'No se pudo crear la carpeta de uploads.';
    } else {
        $avatarNombre = subirAvatar($_FILES['avatar'], $rutaUploads);
        if ($avatarNombre === false) {
            $errores[] = 'El avatar no se pudo subir. Asegúrate de que sea una imagen válida y menor de 2MB.';
        }
    }
}

if (!empty($errores)) {
    $_SESSION['errores'] = $errores;
    $_SESSION['old'] = [
        'nombre' => $nombre,
        'email' => $email,
        'fecha_nacimiento' => $fechaNacimiento,
    ];

    header('Location: index.php');
    exit;
}

$_SESSION['usuario'] = [
    'nombre' => $nombre,
    'email' => $email,
    'slug' => generarSlug($nombre),
    'edad' => calcularEdad($fechaNacimiento),
    'fecha_nacimiento' => $fechaNacimiento,
    'avatar' => $avatarNombre ? 'uploads/' . $avatarNombre : null,
];

header('Location: perfil.php');
exit;
