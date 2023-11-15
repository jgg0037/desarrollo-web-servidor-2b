<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Videojuego</title>
    <?php require "videojuegos.php" ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    $videojuego1 = new Videojuego(1, "Mario Kart", "Nintendo", "7");
    $videojuego2 = new Videojuego(2, "Mario Galaxy", "Nintendu", "16");
    $videojuego3 = new Videojuego(3, "Mario Petanca", "Nintenda", "18");
    /* 
    Crea un array con 3 videojuegos
    Recorre con un foreach el array
    muestralos en una tabla
    */
    $productos=[$videojuego1,$videojuego2,$videojuego3];
    ?>

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
        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td>".$producto->id_videojuego."</td>";
            echo "<td>".$producto->titulo."</td>";
            echo "<td>".$producto->compania."</td>";
            echo "<td>".$producto->pegi."</td>";
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>

   
</body>
</html>