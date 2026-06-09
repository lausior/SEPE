<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once('header.php')?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('menu.php')?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Proyecto de Tareas</h2>
                </div>
                <div class="container">
                     <form action="nueva.php"  method="post" class="mb-5">
                        <div class="mb-3">
                            <label class="form-label">Identificador</label>
                            <input name= "id" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <input name= "descripcion" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select">
                                <option value="pendiente">Pendiente</option>
                                <option value="proceso">En proceso</option>
                                <option value="completada">Completada</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>

                    </form>
                </div>
            </main>
        </div>
    </div>
    <?php include_once('footer.php')?>
</body>
</html> 
 

