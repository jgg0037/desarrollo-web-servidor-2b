<?php

$servidor="localhost";
    $nombreUsuario="root";
    $contrasena="medac";
    $base_datos="db_login";


    $_conexion = new Mysqli($servidor,$nombreUsuario,$contrasena,$base_datos)
        or die("Error de conexion");
?>
