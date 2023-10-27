<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h3>Encuentra el mayor</h3><br>
        <label>Numero 1</label><br>
        <input type="number" name="numero1"><br><br>
        <label>Numero 2</label><br>
        <input type="number" name="numero2"><br><br>
        <label>Numero 3</label><br>
        <input type="number" name="numero3"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = (int) $_POST["numero1"];
        $numero2 = (int) $_POST["numero2"];
        $numero3 = (int) $_POST["numero3"];
        $candidato = $numero1;
        if ($candidato == $numero2 && $candidato == $numero3) {
            echo "<h2>Los 3 son iguales</h2>";
        }else{
            if ($candidato < $numero2) {
                $candidato = $numero2;
            }
            if ($candidato < $numero3) {
                $candidato = $numero3;
            }
        }
        echo "<h2>El mayor es $candidato</h2>";
    }
    ?>

</body>
</html>