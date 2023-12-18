<?php

    $servidor="localhost";
    $nombreProducto="root";
    $contrasena="medac";
    $base_datos="db_libros";


    $_conexion = new Mysqli($servidor,$nombreProducto,$contrasena,$base_datos)
        or die("Error de conexion");

function depurar(string $entrada) : string{
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    return $salida;
}
?>