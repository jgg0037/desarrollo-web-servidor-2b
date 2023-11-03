<?php
function depurar(string $entrada) : string{
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    return $salida;
}
$servidor="localhost";
    $nombreUsuario="root";
    $contrasena="medac";
    $base_datos="bd_videojuegos";


    $conexion = new Mysqli($servidor,$nombreUsuario,$contrasena,$base_datos)
        or die("Error de conexion");
?>
