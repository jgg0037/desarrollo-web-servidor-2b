<?php

$servidor="localhost";
    $nombreUsuario="root";
    $contrasena="medac";
    $base_datos="bd_videojuegos";


    $conexion = new Mysqli($servidor,$nombreUsuario,$contrasena,$base_datos)
        or die("Error de conexion");
?>
