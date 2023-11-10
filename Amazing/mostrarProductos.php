<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "conexion.php"; ?>
    <?php require "objetos.php"; ?>
    
</head>
<body>

    <?php
    $sql = "SELECT * FROM productos";
    $resultado = $conexion ->query($sql);
    $productos = [];
    while ($row = $resultado -> fetch_assoc()) {
        $nuevo_productos = new Producto($row["idProducto"], $row["nombreProducto"], $row["precio"],$row["descripcion"],$row["cantidad"], $row["imagen"]);
        array_push($productos, $nuevo_productos);
    }
    ?>

    <div class="container">
        <h1>Listado de productos</h1>
        <table class="table">
            <thead class="cabecera">
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($productos as $videojuego) {
                echo "<tr>";
                echo "<td>".$videojuego->id_producto."</td>";
                echo "<td>".$videojuego->nombreProducto."</td>";
                echo "<td>".$videojuego->precio."</td>";
                echo "<td>".$videojuego->descripcion."</td>";
                echo "<td>".$videojuego->cantidad."</td>";
                echo "<td><img src='".$videojuego->imagen."' width='70' height='50'></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>