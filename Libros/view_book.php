<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
</head>
<body>
    <?php
    if(!isset($_GET["titulo"])) header('location: index.php');
    
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $titulo = $_GET["titulo"];
        
        $sql = $_conexion -> prepare("SELECT * FROM libros WHERE titulo = ?");
        $sql -> bind_param("s", $titulo);
        $sql -> execute();
        $resultado = $sql -> get_result();
        $sql -> close();
        $fila = $resultado -> fetch_assoc();
    }
    ?>
    <div class="container">
        <h3>Título: <?php echo $fila["titulo"] ?></h3>
        <h3>Páginas: <?php echo $fila["paginas"] ?></h3>
        <h3>Autor/a: <?php echo $fila["autor"] ?></h3>

        <div class="row mb-3">
            <div class="col-1">
                <form action="edit_book.php" method="GET">
                    <input type="hidden" name="titulo" value="<?php echo $titulo ?>">
                    <input class="btn btn-primary" type="submit" value="Editar">
                </form>
            </div>
            <div class="col-1">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>