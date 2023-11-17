<?php

$servidor="localhost";
    $nombreProducto="root";
    $contrasenaUsuario="medac";
    $base_datos="db_login";


    $_conexion = new Mysqli($servidor,$nombreProducto,$contrasenaUsuario,$base_datos)
        or die("Error de conexion");
?>
