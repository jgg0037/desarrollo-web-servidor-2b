<?php
    $servidor="localhost";
    $nombreProducto="root";
    $precio="medac";
    $base_datos="usuarios";


    $conexion = new Mysqli($servidor,$nombreProducto,$precio,$base_datos)
        or die("Error de conexion");
?>
