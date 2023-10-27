<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "util.php"; ?>
    <?php require "videojuegos.php"; ?>
    <style>
        .table{
            border: 2px solid #ff0534;
            /*background-color: #0D002E;*/
            --bs-table-bg: #0D002E;
        }
        .cabecera{
            --bs-table-bg: #7E003D;
        }
    </style>
</head>
<body>

    <?php
    $sql = "SELECT * FROM videojuegos";
    $resultado = $conexion ->query($sql);
    $videojuegos = [];
    while ($row = $resultado -> fetch_assoc()) {
        $nuevo_juego = new Videojuego($row["id_videojuego"], $row["titulo"], $row["compania"],$row["pegi"]);
        array_push($videojuegos, $nuevo_juego);
    }
    ?>

    <div class="container">
        <h1>Listado de videojuegos</h1>
        <table class="table table-dark">
            <thead class="cabecera">
                <tr>
                    <th>ID Videojuego</th>
                    <th>Titulo</th>
                    <th>Compañia</th>
                    <th>Pegi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($videojuegos as $videojuego) {
                echo "<tr>";
                echo "<td>".$videojuego->id_videojuego."</td>";
                echo "<td>".$videojuego->titulo."</td>";
                echo "<td>".$videojuego->compania."</td>";
                echo "<td>".$videojuego->pegi."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>