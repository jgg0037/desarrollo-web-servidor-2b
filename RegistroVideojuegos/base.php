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
        $tmp_nombreProducto=depurar($_POST["id_videojuego"]);
        if(strlen($tmp_nombreProducto)==0){
            $err_nombreProducto="Rellena el campo";
        }else{
            $regex="/^[0-9]{1,8}$/";
            if(!preg_match($regex,$tmp_nombreProducto)){
                $err_nombreProducto="Debe ser un número de 1 a 8 cifras";
            }else{
                $nombreUsuario=$tmp_nombreProducto;
            }
        }
        $tmp_precio=depurar($_POST["titulo"]);
        if(strlen($tmp_precio)==0){
            $err_precio="Rellena el campo";
        }else{
            $regex="/^[a-zA-Z0-9_ñÑ]{1,100}$/";
            if(!preg_match($regex,$tmp_precio)){
                $err_precio="De 1 a 100 caracteres";
            }else{
                $contrasena=$tmp_precio;
            }
        }
        $tmp_cantidad=depurar($_POST["compania"]);
        if(strlen($tmp_cantidad)==0){
            $err_cantidad="Rellena el campo";
        }else{
            $regex="/^[a-zA-Z0-9_ñÑ]{1,50}$/";
            if(!preg_match($regex,$tmp_cantidad)){
                $err_cantidad="De 1 a 50 caracteres";
            }else{
                $fechaNacimiento=$tmp_cantidad;
            }
        }
        $tmp_nacimiento=depurar($_POST["pegi"]);
        if(strlen($tmp_nacimiento)==0){
            $err_descripcion="Rellena el campo";
        }else{
            $dt= DateTime::createFromFormat("Y-m-d",$tmp_nacimiento);
            $fecha_actual=new DateTime();
            $diferencia=$fecha_actual->diff($dt);
            $anios=$diferencia->y;
            if($anios<18){
                $err_descripcion="Eres menor ";
            }else{
                $descripcion=$tmp_nacimiento;
            }
        }
    }


    ?>
    <form action="" method="post">
        <label>ID Videojuego: </label>
        <input type="text" name="id_videojuego">
        <?php
        if (isset($err_nombreProducto)) echo $err_nombreProducto;
        ?><br><br>
         <label>Título: </label>
        <input type="text" name="titulo">
        <?php
        if (isset($err_precio)) echo $err_precio;
        ?><br><br>
        <label>Compañía: </label>
        <input type="text" name="compania">
        <?php
        if (isset($err_cantidad)) echo $err_cantidad;
        ?><br><br>
        <label>Pegi: </label><br>
        <input type="radio" id="opcion1" name="opcion" value="3">
        <input type="radio" id="opcion2" name="opcion" value="7">
        <input type="radio" id="opcion3" name="opcion" value="12">
        <input type="radio" id="opcion4" name="opcion" value="16">
        <input type="radio" id="opcion5" name="opcion" value="18">
        <?php
        if (isset($err_descripcion)) echo $err_descripcion;
        ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($nombreUsuario)&&isset($contrasena)&&isset($fechaNacimiento)&&isset($descripcion)){
        echo $nombreUsuario." ".$contrasena." ".$fechaNacimiento." ".$descripcion;
        $sql = "INSERT INTO videojuegos (id_videojuego, titulo, pegi, compania)
            VALUES ('$nombreUsuario','$contrasena','$descripcion','$fechaNacimiento')";
        $conexion->query($sql);
    };
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>