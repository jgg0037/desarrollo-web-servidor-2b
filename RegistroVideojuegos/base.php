<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "util.php" ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $tmp_usuario=depurar($_POST["id_videojuego"]);
        if(strlen($tmp_usuario)==0){
            $err_usuario="Rellena el campo";
        }else{
            $regex="/^[0-9]{1,8}$/";
            if(!preg_match($regex,$tmp_usuario)){
                $err_usuario="Debe ser un número de 1 a 8 cifras";
            }else{
                $usuario=$tmp_usuario;
            }
        }
        $tmp_nombre=depurar($_POST["titulo"]);
        if(strlen($tmp_nombre)==0){
            $err_nombre="Rellena el campo";
        }else{
            $regex="/^[a-zA-Z0-9_ñÑ]{1,100}$/";
            if(!preg_match($regex,$tmp_nombre)){
                $err_nombre="De 1 a 100 caracteres";
            }else{
                $nombre=$tmp_nombre;
            }
        }
        $tmp_apellido=depurar($_POST["compania"]);
        if(strlen($tmp_apellido)==0){
            $err_apellido="Rellena el campo";
        }else{
            $regex="/^[a-zA-Z0-9_ñÑ]{1,50}$/";
            if(!preg_match($regex,$tmp_apellido)){
                $err_apellido="De 1 a 50 caracteres";
            }else{
                $apellido=$tmp_apellido;
            }
        }
        $tmp_nacimiento=depurar($_POST["pegi"]);
        if(strlen($tmp_nacimiento)==0){
            $err_nacimiento="Rellena el campo";
        }else{
            $dt= DateTime::createFromFormat("Y-m-d",$tmp_nacimiento);
            $fecha_actual=new DateTime();
            $diferencia=$fecha_actual->diff($dt);
            $anios=$diferencia->y;
            if($anios<18){
                $err_nacimiento="Eres menor ";
            }else{
                $pegi=$tmp_nacimiento;
            }
        }
    }


    ?>
    <form action="" method="post">
        <label>ID Videojuego: </label>
        <input type="text" name="id_videojuego">
        <?php
        if (isset($err_usuario)) echo $err_usuario;
        ?><br><br>
         <label>Título: </label>
        <input type="text" name="titulo">
        <?php
        if (isset($err_nombre)) echo $err_nombre;
        ?><br><br>
        <label>Compañía: </label>
        <input type="text" name="compania">
        <?php
        if (isset($err_apellido)) echo $err_apellido;
        ?><br><br>
        <label>Pegi: </label><br>
        <input type="radio" id="opcion1" name="opcion" value="3">
        <input type="radio" id="opcion2" name="opcion" value="7">
        <input type="radio" id="opcion3" name="opcion" value="12">
        <input type="radio" id="opcion4" name="opcion" value="16">
        <input type="radio" id="opcion5" name="opcion" value="18">
        <?php
        if (isset($err_nacimiento)) echo $err_nacimiento;
        ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($usuario)&&isset($nombre)&&isset($apellido)&&isset($pegi)){
        echo $usuario." ".$nombre." ".$apellido." ".$pegi;
        $sql = "INSERT INTO videojuegos (id_videojuego, titulo, pegi, compania)
            VALUES ('$usuario','$nombre','$pegi','$apellido')";
        $conexion->query($sql);
    };
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>