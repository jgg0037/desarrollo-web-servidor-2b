<?php
    $servidor="localhost";
    $usuario="root";
    $contrasena="medac";
    $base_datos="usuarios";


    $conexion = new Mysqli($servidor,$usuario,$contrasena,$base_datos)
        or die("Error de conexion");
?>
