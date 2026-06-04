<!DOCTYPE html>
    <html lang='es'>

    <head>
        <meta charset='UTF-8'>
        <title>Mi Ficha Personal</title>
        <link rel='stylesheet' href='style.css'>

    </head>

    <body>
        <h1>Mi Ficha Personal</h1>
        
        <form method="POST" action="procesar.php">

    <div class="ficha">

        <div class="campo">
            <label class="etiqueta">Nombre completo:</label>
            <input type="text" name="nombre_completo" required>
        </div>

        <div class="campo">
            <label class="etiqueta">Edad:</label>
            <input type="number" name="edad" required>
        </div>

        <div class="campo">
            <label class="etiqueta">Ciudad:</label>
            <input type="text" name="ciudad" required>
        </div>

        <div class="campo">
            <label class="etiqueta">Año de nacimiento:</label>
            <input type="number" name="anio_nacimiento">
        </div>

        <div class="campo">
            <label class="etiqueta">¿Estudia PHP?</label>
            <select name="estudia_php">
                <option value="si">Sí</option>
                <option value="no">No</option>
            </select>
        </div>

    </div>

    <button type="submit">Enviar</button>

</form>
        
    </body>

    </html>