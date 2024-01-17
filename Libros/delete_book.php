<?php
    require ('database_conection.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];
        $sql = $_conexion -> prepare("DELETE FROM libros WHERE titulo = ?");
        $sql -> bind_param("s", $titulo);
        $sql -> execute();
        header('location: index.php');
    }
?>