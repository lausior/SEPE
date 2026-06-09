<html>
    <head>
        <title>DWCS UD2. Boletín 4. Solución</title>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <div id="header" class="container">
            
            <?php
            
            include_once('logo.php');//link al logo
            
            include_once('menu.php');//link al menu
            
            ?>
            
        </div>

        <?php include_once('pictures.php'); //link a las imagenes
        ?>

        <div id="page">
            <div id="bg1">
                <div id="bg2">
                    <div id="bg3">
                    
                        <?php
                
                        include_once('content.php');//link al contenido 
                        
                        include_once('sidebar.php');//link al sidebar
                        
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <?php include_once('footer.php'); //link al pie
        ?>

    </body>
</html>
