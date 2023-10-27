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
        $err_usuario = "Campo obligatorio";
    } else {
        if (filter_var($temp_id_videojuego, FILTER_VALIDATE_INT) === FALSE) {
            $err_usuario = "Introduce un número";
        } else {
            if (strlen($temp_id_videojuego) > 8) {
                $err_usuario = "Máximo 8 dígitos";
            } else{
                $usuario = $temp_id_videojuego;
            }
        }
    }
    #Validación Titulo
    if (strlen($temp_titulo) == 0) {
        $err_nombre = "Campo obligatorio";
    } else{
        if (strlen($temp_titulo) > 100) {
            $err_nombre = "Máximo 100 caracteres";
        } else{
            $nombre = $temp_titulo;
        }
    }
    #Validación PEGI
    if (strlen($temp_pegi) == 0) {
        $err_nacimiento = "Campo obligatorio";
    } else{
        $pegis_validos = ['3','7','12','16','18'];
        if (!in_array($temp_pegi, $pegis_validos)){
            $err_nacimiento = 'Loco, eso no esiste';
        } else{
            $pegi = $temp_pegi;
        }
    }
    #Validación Compañia
    if (strlen($temp_compania) == 0){
        $err_apellido = "Campo obligatorio";
    } else {
        if (strlen($temp_compania) > 100) {
            $err_apellido = "Máximo 100 caracteres";
        } else{
            $apellido = $temp_compania;
        }
    }

    }
    ?>

    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">ID Videojuego</label>
            <input class="form-control" type="text" name="id_videojuego">
            <?php
            if (isset($err_usuario)) {
                ?>
                <div>
                    <?php echo $err_usuario ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Título: </label>
            <input class="form-control" type="text" name="titulo">
            <?php
            if (isset($err_nombre)) {
                ?>
                <div>
                    <?php echo $err_nombre ?>
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
            if (isset($err_nacimiento)) {
                ?>
                <div>
                    <?php echo $err_nacimiento ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Compañía</label>
            <input class="form-control" type="text" name="compania">
            <?php
            if (isset($err_apellido)) {
                ?>
                <div>
                    <?php echo $err_apellido ?>
                </div>
                <?php
            }
            ?>
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>

    <?php
    if (isset($usuario) && isset($nombre) && isset($pegi) && isset($apellido)) {
        echo "exito!";
        $sql = "INSERT INTO videojuegos
        (id_videojuego, titulo, pegi, compania)
        VALUES
        ($usuario, '$nombre','$pegi','$apellido')";
        $conexion->query($sql);
    }    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>