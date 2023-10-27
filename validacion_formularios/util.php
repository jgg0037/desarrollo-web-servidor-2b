<?php

$servidor="localhost";
    $usuario="root";
    $contrasena="medac";
    $base_datos="bd_videojuegos";


    $conexion = new Mysqli($servidor,$usuario,$contrasena,$base_datos)
        or die("Error de conexion");
?>
