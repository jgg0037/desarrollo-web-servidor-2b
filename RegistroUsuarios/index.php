<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "util.php" ?>
    <?php require "baseDatos.php" ?>
    <style>
        .table{
            border: 2px solid #ff0534;
            /*background-color: #0D002E;*/
            --bs-table-bg: #0D002E;
        }
        .cabecera{
            --bs-table-bg: #7E003D;
        }
    </style>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $tmp_nombreProducto=depurar($_POST["usuario"]);
        if(strlen($tmp_nombreProducto)==0){
            $err_nombreProducto="Rellena el campo";
        }else{
            $regex="/^[a-zA-ZñÑ_][a-zA-Z0-9_ñÑ]{3,7}$/";
            if(!preg_match($regex,$tmp_nombreProducto)){
                $err_nombreProducto="Recuerda el nombre de usuario debe empezar por minucula, mayuscula o _, no
                puede contener caracteres especiales y debe tener un extension alfnumrica total de 4 a 8 ";
            }else{
                $nombreProducto=$tmp_nombreProducto;
            }
        }
        $tmp_precio=depurar($_POST["nombre"]);
        if(strlen($tmp_precio)==0){
            $err_precio="Rellena el campo";
        }else{
            $regex="/^([A-ZÑ][a-zA-ZñÑ\ ]{1,19})$/";
            if(!preg_match($regex,$tmp_precio)){
                $err_precio="De 2 a 20 caracteres empezando por mayuscula";
            }else{
                $contrasenaUsuario=$tmp_precio;
            }
        }
        $tmp_cantidad=depurar($_POST["apellido"]);
        if(strlen($tmp_cantidad)==0){
            $err_contrasenia="Rellena el campo";
        }else{
            $regex="/^[A-ZÑ][a-zA-ZñÑ\ ]{1,39}$/";
            if(!preg_match($regex,$tmp_cantidad)){
                $err_contrasenia="De 2 a 40 caracteres empezando por mayuscula ";
            }else{
                $cantidad=$tmp_cantidad;
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
            if($anios<18){
                $err_descripcion="Eres menor ";
            }else{
                $cantidad=$tmp_nacimiento;
            }
        }
    }


    ?>
    <form action="" method="post">
        <label>Usuario: </label>
        <input type="text" name="usuario">
        <?php
        if (isset($err_nombreProducto)) echo $err_nombreProducto;
        ?><br><br>
         <label>Nombre: </label>
        <input type="text" name="nombre">
        <?php
        if (isset($err_precio)) echo $err_precio;
        ?><br><br>
        <label>Apellido: </label>
        <input type="text" name="apellido">
        <?php
        if (isset($err_contrasenia)) echo $err_contrasenia;
        ?><br><br>
        <label>Fecha de nacimiento: </label>
        <input type="date" name="nacimiento">
        <?php
        if (isset($err_descripcion)) echo $err_descripcion;
        ?><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($nombreProducto)&&isset($contrasenaUsuario)&&isset($cantidad)&&isset($cantidad)){
        echo $nombreProducto." ".$contrasenaUsuario." ".$cantidad." ".$cantidad;
        $sql = "INSERT INTO usuarios (usuario, nombre, apellidos, fecha_nacimiento)
            VALUES ('$nombreProducto','$contrasenaUsuario','$cantidad','$cantidad')";
        $conexion->query($sql);
    };
    ?>
    <!--Tabla-->
    <div class="container">
        <h1>Listado de videojuegos</h1>
        <table class="table table-dark">
            <thead class="cabecera">
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha Nacimiento</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM usuarios";
            $resultado = $conexion -> query($sql);
            while ($row = $resultado -> fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["usuario"]."</td>";
                echo "<td>".$row["nombre"]."</td>";
                echo "<td>".$row["apellido"]."</td>";
                echo "<td>".$row["fecha_nacimiento"]."</td>";
                echo "</tr>";
            };
            ?>
            </tbody>
        </table>
    
    </div>


</body>
</html>