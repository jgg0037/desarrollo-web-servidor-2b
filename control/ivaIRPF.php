<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* FUNCIONES */
    define ("GENERAL", 21);
    define ("REDUCIDO", 10);
    define ("SUPERREDUCIDO", 4);
    define ("SIN IVA", 0);
    function precioSinIva(float $precioBase) : float {
        $porcientoIVA = 0.21;
        return ($precioBase - ($precioBase * $porcientoIVA));
    };
    function precioConIva(float $precioBase) : float {
        $porcientoIVA = 0.21;
        return ($precioBase + ($precioBase * $porcientoIVA));
    };
    function salario(int|float $salario) : float{
        $tramo1 = 12450 * 0.81;
        $tramo2 = (20200 - 12450) * 0.76;
        $tramo3 = (35200 - 20200) * 0.7;
        $tramo4 = (60000 - 35200) * 0.63;
        $tramo5 = (300000 - 60000) * 0.55;

        $salarioFinal = match(true) {
            $salario <= 12450 
                => $salario * 0.81,
            $salario > 12450 && $salario <= 20200 
                => $tramo1 + (($salario - 12450) * 0.76),
            $salario > 20200 && $salario <= 35200 
                => $tramo1 + $tramo2 + (($salario - 20200) * 0.7),
            $salario > 35200 && $salario <= 60000 
                => $tramo1 + $tramo2 + $tramo3 + (($salario - 35200) * 0.63),
            $salario > 60000 && $salario <= 300000 
                => $tramo1 + $tramo2 + $tramo3 + $tramo4 + (($salario - 60000) * 0.55),
            $salario > 300000
                => $tramo1 + $tramo2 + $tramo3 + $tramo4 + $tramo5 + (($salario - 300000) * 0.53)      
        };
        return $salarioFinal;
    }
    /* COMPROBACIONES */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_precioBase = $_POST["precioBase"];
        $tmp_salarioBase = $_POST["salarioBase"];
        $selection = $_POST["funcion"];
        if (!filter_var($tmp_precioBase, FILTER_VALIDATE_FLOAT)) {
            $err_precioBase = "Campo obligatorio";
        } else{
            $tmp_precioBase = (float)($tmp_precioBase);
            if ($tmp_precioBase < 0) {
                $err_precioBase = "El valor debe ser mayor a 0";
            } else {
                $precioBase = $tmp_precioBase;
            }
        }
        if (!filter_var($tmp_salarioBase, FILTER_VALIDATE_FLOAT)) {
            $err_salarioBase = "Campo obligatorio";
        } else{
            $tmp_salarioBase = (float)($tmp_salarioBase);
            if ($tmp_salarioBase < 0) {
                $err_salarioBase = "El valor debe ser mayor a 0";
            } else {
                $salarioBase = $tmp_salarioBase;
            }
        }
    }

    ?>
    <br><br>
    <form action="" method="post">
        <label>Precio</label>
        <input type="number" name="precioBase">
        <?php if (isset($err_precioBase)) echo"".$err_precioBase."" ?>
        <br><br>
        <select name="funcion" id="funcion">
            <option value="no">--Selección IVA--</option>
            <option value="conIVA">Con IVA</option>
            <option value="sinIVA">Sin IVA</option>
        </select><br><br>
        <label>Salario</label>
        <input type="number" name="salarioBase">
        <?php if (isset($err_salarioBase)) echo"".$err_salarioBase."" ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <br><br>
    <?php
    if (isset($precioBase)){
        if ($selection == "conIVA") {
            echo "Precio final: ".precioConIva($precioBase)."";
        } else if ($selection == "sinIVA") {
            echo "Precio final: ".precioSinIva($precioBase)."";
        } else{
            echo "Campo obligatorio";
        }
    }
    echo"<br><br>";
    if (isset($salarioBase)) {
        echo "Salario final: ".salario($salarioBase)."";
    }

    ?>

</body>
</html>