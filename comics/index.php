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
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $min = $_POST["min"];
        $max = $_POST["max"];
        $columna = $_POST["columna"];
        if(!empty($_POST['min']) && !empty($_POST['max'])){
            $min = $_POST['min'];
            $max = $_POST['max'];
            if ($columna != "*") {
                $sql = $_conexion -> prepare("SELECT * FROM comics WHERE genero = ? AND paginas BETWEEN ? AND ?");
                $sql -> bind_param("sii", $columna, $min, $max);
                
            } else{
                $sql = $_conexion -> prepare("SELECT * FROM comics WHERE paginas BETWEEN ? AND ?");
                $sql -> bind_param("ii", $min, $max);
            }
                $sql -> execute();
                $resultado = $sql -> get_result();
                $_conexion -> close();
        }else{
            if ($columna == "*") {
                $sql = $_conexion -> prepare("SELECT * FROM comics");
                $sql -> execute();
                $resultado = $sql -> get_result();
                $_conexion -> close();
            }else {
                $sql = $_conexion -> prepare("SELECT * FROM comics WHERE genero = ?");
                $sql -> bind_param("s", $columna);
                $sql -> execute();
                $resultado = $sql -> get_result();
                $_conexion -> close();
            }
        }
        


        
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = $_conexion -> prepare("SELECT * FROM comics");
        $sql -> execute();
        $resultado = $sql -> get_result();
        $_conexion -> close();
    }
    
    ?>
    <div class="container">
        <h1>Comics</h1>

        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-4">
                    <label>Páginas entre:</label>
                    <input class="form-control" type="numeric" name="min" placeholder="0">
                    <input class="form-control" type="numeric" name="max" placeholder="1000">
                </div>
                <div class="col-2">
                    <input class="btn btn-primary" type="submit" value="Buscar">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-1">
                    <label class="form-label">Ordenar por</label>
                </div>
                <div class="col-2">
                    <select class="form-select" name="columna">
                        <option selected value="*">Todos</option>
                        <option value="Acción">Acción</option>
                        <option value="Aventuras">Aventuras</option>
                        <option value="Romance">Romance</option>
                        <option value="Comedia">Comedia</option>
                    </select>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Páginas</th>
                    <th>Género</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fila = $resultado -> fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila["titulo_comic"] ?></td>
                        <td><?php echo $fila["paginas"] ?></td>
                        <td><?php echo $fila["genero"] ?></td>
                        <td>
                            <form action="view_comic.php" method="GET">
                                <input type="hidden" name="titulo_comic" value="<?php echo $fila["titulo_comic"] ?>">
                                <input class="btn btn-secondary" type="submit" value="Ver">
                            </form>
                        </td>
                        <td>
                            <form action="delete_comic.php" method="POST">
                                <input type="hidden" name="titulo" value="<?php echo $fila["titulo_comic"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
        <a href="create_comic.php"><button class="btn btn-secondary">Añadir comic</button></a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>