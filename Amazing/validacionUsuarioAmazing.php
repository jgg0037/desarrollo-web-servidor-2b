<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "conexion.php"; ?>
    <link rel="stylesheet" href="CSS/styleSession.css">
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
            $err_contrasenia="Rellena el campo";
        }else{
            if(strlen($tmp_cantidad) > 255){
                $err_contrasenia="Max 255 caracteres";
            }else{
                $contrasena_cifrada = password_hash($tmp_cantidad, PASSWORD_DEFAULT);
                $contrasenaUsuario=$contrasena_cifrada;
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
    
    <div class="banner">
        <h3>Bienvenido a Amazing</h3>
    </div>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post">
        <h3>Registrarse</h3>

        <label class="form-label">Usuario</label>
        <input class="form-control"type="text"name="usuario">

        <label class="form-label">Contraseña</label>
        <input class="form-control" type="password"name="contrasenaUsuario">

        <label class="form-label">Fecha Nacimiento</label>
        <input class="form-control"type="date" name="nacimiento">

        <?php if(isset($error_inicio)){echo $error_inicio;}; ?>

        <input type="submit" class="btn btn-primary" value="Registrarse">
        <p>Ya tienes cuenta? <a href="iniciarSesion.php"> Inicia Sesion</a></p>
    </form>
    <?php
            if (isset($usuario) && isset($contrasenaUsuario)&& isset($nacimiento)) {
                $sql = "INSERT INTO usuarios (usuario, contrasena, fechaNacimiento) VALUES('$usuario', '$contrasenaUsuario', '$nacimiento')";
                $conexion -> query($sql);
                echo "<h2>Se ha registrado con éxito!</h2>";
                $sql = "INSERT INTO cestas(usuario, precioTotal) VALUES('$usuario','0')";
                $conexion -> query($sql);
                
            }
        ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>