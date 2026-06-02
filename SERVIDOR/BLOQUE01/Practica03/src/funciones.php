<?php
function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
function validarContrasena(string $pass): array
{
    $errores = [];
    if (strlen($pass) < 8) $errores[] = 'Mínimo 8 caracteres';
    if (!preg_match('/[A-Z]/', $pass)) $errores[] = 'Debe tener mayúsculas';
    if (!preg_match('/[0-9]/', $pass)) $errores[] = 'Debe tener números';
    if (!preg_match('/[^a-zA-Z0-9]/', $pass)) $errores[] = 'Debe tener símbolos';
    return $errores;
}
function generarSlug(string $texto): string
{
    $texto = strtolower(trim($texto));
    $texto = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
    $texto = preg_replace('/[^a-z0-9-]/', '-', $texto);
    return preg_replace('/-+/', '-', trim($texto, '-'));
}
function calcularEdad(string $fechaNacimiento): int
{
    return (new DateTime())->diff(new DateTime($fechaNacimiento))->y;
}
function subirAvatar(array $archivo, string $destino): string|false
{
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxTamano = 2 * 1024 * 1024; // 2MB
    if ($archivo['error'] !== UPLOAD_ERR_OK) return false;
    if (!in_array($archivo['type'], $tiposPermitidos)) return false;
    if ($archivo['size'] > $maxTamano) return false;
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    $nombreSeguro = uniqid('avatar_') . '.' . strtolower($extension);
    $rutaDestino = $destino . $nombreSeguro;
    if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
        return $nombreSeguro;
    }
    return false;
}
