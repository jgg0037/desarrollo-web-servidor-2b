<?php

$servidor="localhost";
    $nombreProducto="root";
    $precio="medac";
    $base_datos="db_login";


    $_conexion = new Mysqli($servidor,$nombreProducto,$precio,$base_datos)
        or die("Error de conexion");
?>
