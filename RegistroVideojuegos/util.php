<?php
function depurar(string $entrada) : string{
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    return $salida;
}
$servidor="localhost";
    $nombreProducto="root";
    $contrasenaUsuario="medac";
    $base_datos="bd_videojuegos";


    $conexion = new Mysqli($servidor,$nombreProducto,$contrasenaUsuario,$base_datos)
        or die("Error de conexion");
?>
