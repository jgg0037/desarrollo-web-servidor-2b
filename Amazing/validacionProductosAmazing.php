<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "conexion.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $tmp_nombreProducto=depurar($_POST["nombreProducto"]);
        if(strlen($tmp_nombreProducto)==0){
            $err_nombreProducto="Campo obligatorio";
        }else{
            $regex="/^[a-zA-Z0-9_ñÑ ]{1,40}$/";
            if(!preg_match($regex,$tmp_nombreProducto)){
                $err_nombreProducto="Max. 40 caracteres, solo acepta letras, números y espacios en blanco";
            }else{
                $nombreProducto=$tmp_nombreProducto;
            }
        }
        $tmp_precio=depurar($_POST["precio"]);
        if(strlen($tmp_precio)==0){
            $err_precio="Campo obligatorio";
        }else{
            if($tmp_precio < 0 || $tmp_precio > 99999.99){
                $err_precio="Máximo 99999.99, debe ser mayor a 0";
            }else{
                $precio=$tmp_precio;
            }
        }
        $tmp_descripcion=depurar($_POST["descripcion"]);
        if(strlen($tmp_descripcion)==0){
            $err_descripcion="Campo obligatorio";
        }else{
            $regex="/^[a-zA-Z0-9ñÑ\ ]{1,255}$/";
            if(!preg_match($regex,$tmp_descripcion)){
                $err_descripcion="Max. 255 caracteres";
            }else{
                $descripcion=$tmp_descripcion;
            }
        }
        $tmp_cantidad=depurar($_POST["cantidad"]);
        if(strlen($tmp_cantidad)==0){
            $err_cantidad="Campo obligatorio";
        }else{
            if($tmp_cantidad < 0 || $tmp_cantidad > 99999){
                $err_cantidad="Min. 0, max. 99999";
            }else{
                $cantidad=$tmp_cantidad;
            }
        }
        /*Working on*/
        $imgName = $_FILES["imgProducto"]["name"];
        if(strlen($imgName)== 0){
            $err_imgProducto = "Campo obligatorio";
        }else{
            $imgType = $_FILES["imgProducto"]["type"];
            if ($imgType!="image/png"&&$imgType!="image/jpg"&&$imgType!="image/jpeg") {
                $err_imgProducto = "Formato incorrecto, solo se admite .png, .jpg, y .jpeg";
            } else {
                $imgSize = $_FILES["imgProducto"]["size"];
                if ($imgSize > 5242880) {
                    $err_imgProducto = "La imagen no puede pesar más de 5MB";
                } else {
                $rutaTemp = $_FILES["imgProducto"]["tmp_name"];
                $rutaImg="img/" . $imgName;
                move_uploaded_file($rutaTemp, $rutaImg);
                }
            }
        }
    }


    ?>
    <form action="" method="post" class="container" enctype="multipart/form-data">
        <h1>Registro de Productos de Amazing</h1><br>
        <label class="form-label">Nombre del Producto: </label>
        <input type="text" name="nombreProducto" class="form-control">
        <?php
        if (isset($err_nombreProducto)) echo $err_nombreProducto;
        ?><br><br>
         <label class="form-label">Precio: </label>
        <input type="text" name="precio" class="form-control">
        <?php
        if (isset($err_precio)) echo $err_precio;
        ?><br><br>
        <label class="form-label">Descripción: </label>
        <input type="text" name="descripcion" class="form-control">
        <?php
        if (isset($err_descripcion)) echo $err_descripcion;
        ?><br><br>
        <label class="form-label">Cantidad: </label>
        <input type="text" name="cantidad" class="form-control">
        <?php
        if (isset($err_cantidad)) echo $err_cantidad;
        ?><br><br>
        <label class="form-label">Imagen del producto: </label>
        <input type="file" name="imgProducto" class="form-control">
        <?php
        if (isset($err_imgProducto)) echo $err_imgProducto;
        ?><br><br>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
    <?php
    if (isset($nombreProducto)&&isset($precio)&&isset($cantidad)&&isset($descripcion)&&isset($rutaImg)){
        echo "<h2>Producto registrado con éxito!</h2>";
        $sql = "INSERT INTO productos (nombreProducto, precio, cantidad, descripcion, imagen)
            VALUES ('$nombreProducto','$precio','$cantidad','$descripcion','$rutaImg')";
        $conexion->query($sql);
    };
    ?>

</body>
</html>