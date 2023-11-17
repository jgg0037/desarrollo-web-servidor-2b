<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "conexion.php"; ?>
</head>
<body>
    <?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $tmp_nombreProducto=depurar($_POST["usuario"]);
        if(strlen($tmp_nombreProducto)==0){
            $err_nombreProducto="Rellena el campo";
        }else{
            $regex="/^[a-zA-Z0-9_ñÑ]{4,12}$/";
            if(!preg_match($regex,$tmp_nombreProducto)){
                $err_nombreProducto="Max 12 caracteres y barra baja";
            }else{
                $usuario=$tmp_nombreProducto;
            }
        }
        $tmp_cantidad=depurar($_POST["contrasenaUsuario"]);
        if(strlen($tmp_cantidad)==0){
            $err_cantidad="Rellena el campo";
        }else{
            if(strlen($tmp_cantidad) > 255){
                $err_cantidad="Max 255 caracteres";
            }else{
                $contrasena_cifrada = password_hash($tmp_cantidad, PASSWORD_DEFAULT);
                $precio=$contrasena_cifrada;
            }
        }
        $tmp_nacimiento=depurar($_POST["nacimiento"]);
        if(strlen($tmp_nacimiento)==0){
            $err_descripcion="Rellena el campo";
        }else{
            $dt= DateTime::createFromFormat("Y-m-d",$tmp_nacimiento);
            $fecha_actual=new DateTime();
            $diferencia=$fecha_actual->diff($dt);
            $anios=$diferencia->y;
            if($anios<12){
                $err_descripcion="Eres menor ";
            }elseif ($anios>120) {
                $err_descripcion="Eres viejo ";
            } else{
                $nacimiento=$tmp_nacimiento;
            }
        }
    }
    ?>
    <div class="container">
        <h1>Registrarse</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control"type="text"name="usuario">
                <?php if (isset($err_nombreProducto)) echo"".$err_nombreProducto."" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="contrasenaUsuario">
                <?php if (isset($err_cantidad)) echo"".$err_cantidad."" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha Nacimiento</label>
                <input class="form-control"type="date" name="nacimiento">
                <?php if (isset($err_descripcion)) echo"".$err_descripcion."" ?>
            </div>
            <input type="submit" class="btn btn-primary" value="Registrarse">
        </form>
        <?php
            if (isset($usuario) && isset($precio)&& isset($nacimiento)) {
                echo "<h2>Se ha registrado con éxito!</h2>";
                $sql = "INSERT INTO usuarios VALUES('$usuario', '$precio', '$nacimiento')";
                $conexion -> query($sql);
                $sql = "INSERT INTO cestas(usuario, precioTotal) VALUES('$usuario','0')";
                $conexion -> query($sql);
            }
        ?>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>