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
        $tmp_contrasena=depurar($_POST["contrasena"]);
        if(strlen($tmp_contrasena)==0){
            $err_contrasena="Rellena el campo";
        }else{
            if(count_chars($tmp_contrasena) > 255){
                $err_contrasena="Max 255 caracteres";
            }else{
                $contrasena_cifrada = password_hash($tmp_contrasena, PASSWORD_DEFAULT);
                $contrasena=$contrasena_cifrada;
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
            }else{
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
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password"name="contrasena">
            </div>
            <input type="submit" class="btn btn-primary" value="Registrarse">
        </form>
        <?php
            if (isset($usuario) && isset($contrasena)) {
                $sql = "INSERT INTO usuarios VALUES('$usuario', '$contrasena_cifrada')";
                $conexion -> query($sql);
            }
        ?>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>