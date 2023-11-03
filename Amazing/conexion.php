<?php

$servidor="localhost";
    $nombreUsuario="root";
    $contrasena="medac";
    $base_datos="bd_amazon";


    $conexion = new Mysqli($servidor,$nombreUsuario,$contrasena,$base_datos)
        or die("Error de conexion");

function depurar(string $entrada) : string{
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    return $salida;
}
?>