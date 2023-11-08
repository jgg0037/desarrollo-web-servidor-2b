<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "./funciones.php" ?>
</head>

<body>
    <form action="" method="GET">
        <h1>Ejercicio 1: Conversor de moneda</h1>

        <label for="cantidad">Cantidad:</label><br>
        <input type="number" name="cantidad">
        <input type="hidden" name="secret" value="secret"><br><br>
        <label for="origen">Moneda de origen:</label><br>
        <input type="radio" id="$" name="origen" value="$">
        <label for="$">Dolares</label>
        <input type="radio" id="$" name="origen" value="€">
        <label for="$">Euros</label>
        <input type="radio" id="Y" name="origen" value="Y">
        <label for="Y">Yenes</label><br>
        <label for="destino">Divisa de destino:</label><br>
        <input type="radio" id="$" name="destino" value="$">
        <label for="$">Dolares</label>
        <input type="radio" id="€" name="destino" value="€">
        <label for="€">Euros</label>
        <input type="radio" id="Y" name="destino" value="Y">
        <label for="Y">Yenes</label><br>
        <input type="submit" value="Enviar"><br>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["secret"])) {
                if ($_GET["secret"] == "secret") {
                    $cantidad = (float) $_GET["cantidad"];
                    $origen = $_GET["origen"];
                    $destino = $_GET["destino"];
                    echo "<h2>Conversión: " . cambiarDivisa($cantidad, $origen, $destino) . "</h2>";
                }
            }
        }
        ?>
    </form>


    <hr>
    <h1>Ejercicio 2: Algoritmos matemáticos</h1>
    <form action="" method="GET">
        <label>Numero:</label>
        <input type="number" name="numero"><br>
        Funcion a realizar
        <select name="funcion" id="funcion">
            <option value="sumatorio">Sumatorio</option>
            <option value="factorial">Factorial</option>
        </select><br>
        <input type="submit" value="Calcular">
        <input type="hidden" name="secret2" value="secret2"><br>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["secret2"])) {
                if ($_GET["secret2"] == "secret2") {
                    $numero = (int) $_GET["numero"];
                    $opcion = $_GET["funcion"];
                    $mensaje = "";
                    if ($opcion == "sumatorio") {
                        if ($numero <= 0) {
                            $mensaje = "Error, numero no valido";
                        } else {
                            $mensaje = sumatorio($numero);
                        }
                    } elseif ($opcion == "factorial") {
                        if ($numero <= 0) {
                            $mensaje = "Error, numero no valido";
                        } else {
                            $mensaje = factorial($numero);
                        }
                    }
                    echo "<h2>Resultado: $mensaje</h2>";
                }

            }
        }
        ?>
    </form>
    <hr>
    <h1>Ejercicio 3: Array de animales</h1>

    <?php
    $animales = [
        ["Lobo ibérico", "Mamífero", 2500],
        ["Lince ibérico", "Mamífero", 1668],
        ["Quebrantahuesos", "Ave", 2000],
        ["Oso pardo", "Mamífero", 500]
    ];
    ?>
    <table>
        <thead>
            <tr>
                <th>Especie</th>
                <th>Clase</th>
                <th>Ejemplares</th>
                <th>Estado</th>
            </tr>
        </thead>
        <?php
        foreach ($animales as $animal) {
            echo "<tr>";
            foreach ($animal as $key => $value) {
                echo "<td>" . $value . "</td>";
                if ($key == 2) {
                    echo "<td>" . comprobarEstado($value) . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <h2>Buscar especie</h2>
        <form>
            <label>Especie: </label>
            <input type="text" name="animal"><br><br>
            <input type="submit" value="Comprobar">
            <input type="hidden" name="secret3" value="secret3">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (isset($_GET["secret3"])) {
                    if ($_GET["secret3"] == "secret3") {
                        $animal = $_GET["animal"];
                        echo "<h3>" . buscarAnimal($animal, $animales) . "</h3>";
                    }
                }
            }
            ?>
        </form>


</body>

</html>