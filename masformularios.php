<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        fieldset{
            background-color:lightsalmon;
        }
    </style>
</head>
<body>

    <h2>Formulario IVA</h2>

    <fieldset>
    <form action="" method="get">
        <label>Precio: </label>
        <input type="number" name="precio"><br><br>
        <label>IVA: </label>
        <select name="iva">
            <option value="GENERAL">General</option>
            <option value="REDUCIDO">Reducido</option>
            <option value="SUPERREDUCIDO">Superreducido</option>
            <option value="SIN IVA">Sin iva</option>
        </select>
        <br>
        <input type="hidden" name="f" value="iva">
        <br>
        <input type="submit" value="Calcular">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["f"])) {
                if ($_GET["f"] == "iva") {
                    $contrasena = (float) $_GET["precio"];
                    $iva = $_GET["iva"];
                    echo "<h3>EL precio con iva es: ".precioConIva($contrasena, $iva)."</h3>";
                }
            }
        }
        function precioConIva(int $precioBase, String $tipoIVA) : float {
            $porcientoIVA = match($tipoIVA) {
                "GENERAL" => 0.21,
                "REDUCIDO" => 0.1,
                "SUPERREDUCIDO" => 0.04,
                "SIN IVA" => 0
            };
            return ($precioBase + ($precioBase * $porcientoIVA));
        };
        ?>
    </form>
    </fieldset>
    <br><br><hr>
    <h2>Formulario para IRPF</h2>
    <fieldset>
    <form action="" method="get">
        <label>Salario: </label>
        <input type="number" step="1000" name="salario"><br>
        <input type="hidden" name="f" value="irpf"><br>
        <input type="submit" value="Calcular">
        <?php
        function reduccion (float $parte, float $irpf) : float {
            return ($parte - $parte * $irpf);
        }
        function salarioIRPF(float $salarioBruto) : float {
            $tramo1 = 12450 * 0.81;
            $tramo2 = $tramo1 + (20200 - 12450) * 0.76;
            $tramo3 = $tramo2 + (35200 - 20200) * 0.7;
            $tramo4 = $tramo3 + (60000 - 35200) * 0.63;
            $tramo5 = $tramo4 + (300000 - 60000) * 0.55;
            if ($salarioBruto <= 12450) {
                return reduccion($salarioBruto, 0.19);
            }
            elseif ($salarioBruto < 20200) {
                $total = $tramo1 + reduccion($salarioBruto - 12450, 0.24);
                return $total;
            }
            elseif ($salarioBruto < 35200) {
                $total = $tramo2 + reduccion($salarioBruto - 20200, 0.30);
                return $total;
            }
            elseif ($salarioBruto < 60000) {
                $total = $tramo3 + reduccion($salarioBruto - 35200, 0.37);
                return $total;
            }
            elseif ($salarioBruto < 300000) {
                $total = $tramo4 + reduccion($salarioBruto - 60000, 0.45);
                return $total;
            }
            else {
                $total = reduccion(12450, 0.19);
                $total = $tramo5 + reduccion($salarioBruto - 300000, 0.47);
                return $total;
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["f"])) {
                if ($_GET["f"] == "irpf") {
                    $salario = (float) $_GET["salario"];
                    echo "<h3>Salario neto: ".salarioIRPF($salario)."</h3>";
                }
            }
        }
    ?>
    </form>
    </fieldset>
</body>
</html>