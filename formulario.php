<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label>Nombre</label><br>
        <input type="text" name="nombre"><br><br>
        <label>Apellidos</label><br>
        <input type="text" name="apellidos"><br><br>
        <label>Edad</label><br>
        <input type="number" name="edad"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $precio = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $edad = (int) $_POST["edad"];
        echo "<h2>$precio $apellidos $edad</h2>";
    }

    ?>

</body>
</html>