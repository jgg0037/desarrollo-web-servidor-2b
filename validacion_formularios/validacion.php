<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Pruebas
    </title>
</head>
<body>
    <?php
    function depurar(string $entrada) : string {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_Campo1 = depurar ($_POST["campo1"]);
        
        if (strlen($temp_Campo1) > 0) {
            if (is_numeric($temp_Campo1)) {
                $temp_Campo1 = (float)$temp_Campo1;
                if ($temp_Campo1 >= 0) {
                    $campo1 = $temp_Campo1;
                } else {
                    $err_campo1 = "El número debe ser positivo";
                }
            } else {
                $err_campo1 = "Debes introducir un número";
            }
            echo $temp_Campo1;
        } else {
            $err_campo1 = "Este campo es obligatorio";
        }

    }

    ?>
    <form action="" method="post">
        <label>Campo 1:</label>
        <input type="text" name="campo1">
        <?php if (isset($err_campo1)) echo"".$err_campo1."" ?>
        <br><br>
        <input type="submit" value="Enviar">
        <br><br>
    </form>
    <?php 
        if (isset($campo1)) echo "".$campo1
    ?>
</body>
</html>