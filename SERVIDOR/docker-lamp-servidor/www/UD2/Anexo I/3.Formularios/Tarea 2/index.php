<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 2</title>
</head>
<body>
    <form method = "GET" action="formulario.php">
        <label for="bebida">Selecciona una bebida</label>
        <select name ="bebida" value="Selecciona una bebida">
            <option value="cocacola" name="cocacola" id="cocacola">Cocacola - 1€</option>
            <option value="pepsi" name="pepsi" id="pepsi" >Pepsi - 0.80€</option>
            <option value="fanta" name="fanta" id="fanta">Fanta Naranja - 0.90€</option>
            <option value="trina" name="trina" id="trina">Trina Manzana - 1.10€</option>
        </select>
        <br><br>

        <label for="cantidad">Elige la cantidad: </label>
        <input type="number" name="cantidad" id="cantidad">
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>