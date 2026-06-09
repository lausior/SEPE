<h2>PHP Ejemplo de validación de Formularios</h2>

<form method="post" action="procesado.php">
    <!-- NOMBRE -->
    Nombre: <input type="text" name="name">
    <br><br>
    <!-- E-MAIL -->
    E-mail: <input type="text" name="email">
    <br><br>
    <!-- WEBSITE -->
    Website: <input type="text" name="website">
    <br><br>
    <!-- GÉNERO -->
    Género:
    <input type="radio" name="gender" value="female">Mujer
    <input type="radio" name="gender" value="male">Hombre
    <input type="radio" name="gender" value="other">Other
    <br><br>
    
    <input type="submit" name="submit" value="Submit">
</form>