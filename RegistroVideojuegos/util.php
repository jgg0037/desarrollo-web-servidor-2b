<?php
function depurar(string $entrada) : string{
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    return $salida;
}
$servidor="localhost";
    $usuario="root";
    $contrasena="medac";
    $base_datos="bd_videojuegos";


    $conexion = new Mysqli($servidor,$usuario,$contrasena,$base_datos)
        or die("Error de conexion");
?>
