<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "util.php" ?>
</head>
<body class="container">
    <h2>Mete un juego!</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_id_videojuego = depurar($_POST["id_videojuego"]);
        $temp_titulo = $_POST["titulo"];
        if (isset($_POST["pegi"])) {
            $temp_pegi = $_POST["pegi"];
        } else {
            $temp_pegi = "";
        }
        $temp_compania = $_POST["compania"];
    
    #Validación ID
    if (strlen($temp_id_videojuego) == 0) {
        $err_nombreProducto = "Campo obligatorio";
    } else {
        if (filter_var($temp_id_videojuego, FILTER_VALIDATE_INT) === FALSE) {
            $err_nombreProducto = "Introduce un número";
        } else {
            if (strlen($temp_id_videojuego) > 8) {
                $err_nombreProducto = "Máximo 8 dígitos";
            } else{
                $nombreProducto = $temp_id_videojuego;
            }
        }
    }
    #Validación Titulo
    if (strlen($temp_titulo) == 0) {
        $err_precio = "Campo obligatorio";
    } else{
        if (strlen($temp_titulo) > 100) {
            $err_precio = "Máximo 100 caracteres";
        } else{
            $contrasenaUsuario = $temp_titulo;
        }
    }
    #Validación PEGI
    if (strlen($temp_pegi) == 0) {
        $err_descripcion = "Campo obligatorio";
    } else{
        $pegis_validos = ['3','7','12','16','18'];
        if (!in_array($temp_pegi, $pegis_validos)){
            $err_descripcion = 'Loco, eso no esiste';
        } else{
            $cantidad = $temp_pegi;
        }
    }
    #Validación Compañia
    if (strlen($temp_compania) == 0){
        $err_contrasenia = "Campo obligatorio";
    } else {
        if (strlen($temp_compania) > 100) {
            $err_contrasenia = "Máximo 100 caracteres";
        } else{
            $cantidad = $temp_compania;
        }
    }

    }
    ?>

    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">ID Videojuego</label>
            <input class="form-control" type="text" name="id_videojuego">
            <?php
            if (isset($err_nombreProducto)) {
                ?>
                <div>
                    <?php echo $err_nombreProducto ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Título: </label>
            <input class="form-control" type="text" name="titulo">
            <?php
            if (isset($err_precio)) {
                ?>
                <div>
                    <?php echo $err_precio ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">PEGI</label>
            <select class="form-select" name="pegi">
                <option selected disabled hidden>-- Elige PEGI --</option>
                <option value="3">PEGI 3</option>
                <option value="7">PEGI 7</option>
                <option value="12">PEGI 12</option>
                <option value="16">PEGI 16</option>
                <option value="18">PEGI 18</option>
            </select>
            <?php
            if (isset($err_descripcion)) {
                ?>
                <div>
                    <?php echo $err_descripcion ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Compañía</label>
            <input class="form-control" type="text" name="compania">
            <?php
            if (isset($err_contrasenia)) {
                ?>
                <div>
                    <?php echo $err_contrasenia ?>
                </div>
                <?php
            }
            ?>
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>

    <?php
    if (isset($nombreProducto) && isset($contrasenaUsuario) && isset($cantidad) && isset($cantidad)) {
        echo "exito!";
        $sql = "INSERT INTO videojuegos
        (id_videojuego, titulo, pegi, compania)
        VALUES
        ($nombreProducto, '$contrasenaUsuario','$cantidad','$cantidad')";
        $conexion->query($sql);
    }    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>