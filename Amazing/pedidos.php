<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "conexion.php"; ?>
    <?php require "objetos.php"; ?>
    <link rel="stylesheet" href="CSS/styleMain.css">
</head>
<body>
<header class="header">
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="mostrarProductos.php">
                    <img src="./img/logoAmazing.jfif" alt="Bootstrap" width="75" height="75">
                </a>
                <a class="navbar-brand" href="mostrarProductos.php">Amazing</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="mostrarProductos.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mostrarCesta.php">Cesta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pedidos.php">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Añadir producto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</header>
<?php
    /*Mantener Sesion*/
    session_start();
    if (isset($_SESSION["usuario"])) {
        $usuario = $_SESSION["usuario"];
    }
    ?>
    <div class="row welcome">
    <div class="col">
    <h1>Confirmación del pedido</h1>
    </div>
    <div class="col">
    <?php 
            if (isset($usuario)) {
                echo "<h4>Se pedirán los siguientes productos para $usuario</h4>";
                echo"<h4><a href='cerrarSesion.php'>Cerrar Sesion</a></h4>";
            } else{
                echo "<h4>Parece que no has iniciado sesión</h4>";
                echo"<h4><a href='iniciarSesion.php'>Iniciar Sesion</a></h4>";
            }
            ?>
    </div>
        </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*Obtener ID cesta del usuario logeado*/
        $sql = "SELECT idCesta FROM cestas where usuario = '$usuario'";
        $resultado = $conexion -> query($sql);
        $arraycesta = $resultado->fetch_assoc();
        $id_cesta = $arraycesta["idCesta"];
        echo"<p>El IDCesta es $id_cesta</p>";

        
    }
    ?>
    
    <div class="container">
        <h4><a href="mostrarProductos.php" style="float: right;">Volver a tu cesta</a></h4>
        <h1>Tus productos</h1>
        <table class="table">
            <thead class="cabecera">
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT c.idProducto, c.cantidad, p.idProducto, p.nombreProducto, p.precio, p.imagen
                FROM productosCestas c
                INNER JOIN productos p
                ON c.idProducto = p.idProducto";
                $resultado = $conexion ->query($sql);
                
                foreach ($resultado as $producto) {
                ?>
                <tr>
                <td><?php echo $producto["idProducto"]?></td>
                <td><?php echo $producto["nombreProducto"]?></td>
                <td><?php echo $producto["precio"]?></td>
                <td><?php echo $producto["cantidad"]?></td>
                <td><img <?php echo "src='".$producto["imagen"]."' width='70' height='50'"?>></td>
                </tr>
                <?php
                }
            ?>
            </tbody>
        </table>
        <form action="" method="post">
        <input class="btn" type="submit" value="Realizar pedido">
        </form>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>