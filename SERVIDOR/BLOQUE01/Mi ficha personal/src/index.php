< !DOCTYPE html>
    <html lang='es'>

    <head>
        <meta charset='UTF-8'>
        <title>Mi Ficha Personal</title>
        <link rel='stylesheet' href='style.css'>

    </head>

    <body>
        <h1>Mi Ficha Personal</h1>
        <div class='ficha'>
            <div class='campo'><span class='etiqueta'>Nombre completo:</span></div>
            <div class='campo'><span class='etiqueta'>Edad:</span><?= $edad ?>años</div>
            <div class='campo'><span class='etiqueta'>Ciudad:</span></div>
            <div class='campo'><span class='etiqueta'>Año de nacimiento:</span></div>
            <div class='campo'><span class='etiqueta'>¿Estudia PHP?</span></div>
        </div>
        
    </body>

    </html>