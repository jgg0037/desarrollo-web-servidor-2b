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
        $tmp_usuario=depurar($_POST["usuario"]);
        if(strlen($tmp_usuario)==0){
            $err_usuario="Rellena el campo";
        }else{
            $regex="/^[a-zA-Z0-9_ñÑ]{4,12}$/";
            if(!preg_match($regex,$tmp_usuario)){
                $err_usuario="Max 12 caracteres y barra baja";
            }else{
                $usuario=$tmp_usuario;
            }
        }
        $tmp_contrasenaUsuario=depurar($_POST["contrasenaUsuario"]);
        if(strlen($tmp_contrasenaUsuario)==0){
            $err_contrasenia="Rellena el campo";
        } else{
            /*Validación de la contraseña*/
            if(strlen($tmp_contrasenaUsuario) < 8 || strlen($tmp_contrasenaUsuario) > 20 ||
            !preg_match('/[a-z]/', $tmp_contrasenaUsuario) ||
            !preg_match('/[A-Z]/', $tmp_contrasenaUsuario) ||
            !preg_match('/[0-9]/', $tmp_contrasenaUsuario) ||
            !preg_match('/[!@#\$%\^&\*\(\)_\+\-=\[\]\{\};:\'",<>\.\?~]/', $tmp_contrasenaUsuario)){
                $err_contrasenia="Contraseña no válida";
            }else{
                $contrasena_cifrada = password_hash($tmp_contrasenaUsuario, PASSWORD_DEFAULT);
                $contrasenaUsuario=$contrasena_cifrada;
            }
        }
        $tmp_nacimiento=depurar($_POST["nacimiento"]);
        if(strlen($tmp_nacimiento)==0){
            $err_nacimiento="Rellena el campo";
        }else{
            $dt= DateTime::createFromFormat("Y-m-d",$tmp_nacimiento);
            $fecha_actual=new DateTime();
            $diferencia=$fecha_actual->diff($dt);
            $anios=$diferencia->y;
            if($anios<12){
                $err_nacimiento="Eres menor ";
            }elseif ($anios>120) {
                $err_nacimiento="Eres viejo ";
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