<?php
function depurar(string $entrada) : string{
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    return $salida;
}
$servidor="localhost";
    $nombreProducto="root";
    $precio="medac";
    $base_datos="bd_videojuegos";


    $conexion = new Mysqli($servidor,$nombreProducto,$precio,$base_datos)
        or die("Error de conexion");
?>
