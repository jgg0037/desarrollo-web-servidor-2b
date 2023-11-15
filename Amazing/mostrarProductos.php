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
    /*Mantener Sesion*/
    session_start();
    if (isset($_SESSION["usuario"])) {
        $usuario = $_SESSION["usuario"];
    }
    ?>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /*Obtener ID de producto*/
        $id_producto = $_POST["id_producto"];
        echo"<p>El producto seleccionado es $id_producto</p>";
        
        $cantidad = 1;

        /*Obtener ID cesta del usuario logeado*/
        $sql = "SELECT idCesta FROM cestas where usuario = '$usuario'";
        $resultado = $conexion -> query($sql);
        $arraycesta = $resultado->fetch_assoc();
        $id_cesta = $arraycesta["idCesta"];
        echo"<p>El IDCesta es $id_cesta</p>";

        /*Comprobar si el objeto ya está en base de datos*/
        $sql = "SELECT cantidad FROM productoscestas where idCesta = '$id_cesta' AND idProducto = '$id_producto'";
        $resultado = $conexion -> query($sql) -> fetch_assoc();
        error_reporting(0);
        if ($resultado["cantidad"]) {
            $cantidad = $resultado["cantidad"] + 1;
            $sql = "UPDATE productoscestas SET cantidad = $cantidad where idProducto = '$id_producto'";
            $conexion -> query($sql);
        } else{
            $sql = "INSERT INTO productoscestas (idProducto, idCesta, cantidad)
                    VALUES ($id_producto, $id_cesta, $cantidad)";
            $conexion -> query($sql);
        }
        error_reporting(-1);

        
        /* if ($arrayproductocesta["idProducto"] == $id_producto) {
            $sql = "UPDATE productoscestas SET cantidad = ($cantidad +1) where idProducto = '$id_producto'";
            $conexion -> query($sql);
            echo "$id_producto";
        }else{
            echo "$id_producto";
            $sql = "INSERT INTO productoscestas (idProducto, idCesta, cantidad)
                    VALUES ($id_producto, $id_cesta, $cantidad)";
            $conexion -> query($sql);
        } */
    }
    ?>
    
    <div class="container">
        <h1>Esta es la página principal</h1>
        <h2>Bienvenid@ <?php 
        if (isset($usuario)) {
            echo $usuario;
        } ?>
        </h2>
    </div>

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
        <a href="cerrarSesion.php" style="float: right;">Cerrar Sesion</a>
        <br>
        <a href="mostrarCesta.php" style="float: right;">Mi Cesta</a>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($productos as $producto) { ?>
                <tr>
                <td><?php echo $producto->id_producto ?></td>
                <td><?php echo $producto->nombreProducto ?></td>
                <td><?php echo $producto->precio ?></td>
                <td><?php echo $producto->descripcion ?></td>
                <td><?php echo $producto->cantidad ?></td>
                <td><img <?php echo "src='".$producto->imagen."' width='70' height='50'"?>></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id_producto" value="<?php echo $producto -> id_producto ?>">
                        <input class="btn btn-danger" type="submit" value="Añadir a cesta">
                    </form>
                </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>