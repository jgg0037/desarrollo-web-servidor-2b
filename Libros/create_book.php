<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'databaseConection.php'; ?>
</head>
<body>  
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];
        $paginas = (int) $_POST["paginas"];
        $autor = $_POST["autor"];

        $sql = $_conexion -> prepare("INSERT INTO libros VALUES (?,?,?)");
        $sql -> bind_param("sis", $titulo, $paginas, $autor);
        $sql -> execute();
    }
    ?>
    <div class="container">
        <h1>Crear libro</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
            </div>
            <div class="mb-3">
                <label class="form-label">Páginas</label>
                <input class="form-control" type="text" name="paginas">
            </div>
            <div class="mb-3">
                <label class="form-label">Autor/a</label>
                <input class="form-control" type="text" name="autor">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="crear">
            </div>
        </form>
    </div>
</body>
</html>