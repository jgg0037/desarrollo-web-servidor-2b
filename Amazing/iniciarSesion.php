<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <?php require "conexion.php"; ?>
</head>
<body>
    <?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuario = $_POST["usuario"];
        $precio = $_POST["contrasena"];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $conexion -> query($sql);

        if($resultado -> num_rows > 0){

        while ($fila = $resultado -> fetch_assoc()) {
            $contrasena_cifrada = $fila["contrasena"];
        }
        

        $acceso_valido = password_verify($precio, $contrasena_cifrada);
        if($acceso_valido){
            session_start();
            $_SESSION["usuario"] = $usuario;
            header('location: mostrarProductos.php');
        } else {
            echo "Usuario o contraseña erroneo";
        }
        } else {
            echo "Usuario o contraseña erroneo";
        }
    }   
    ?>
    
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form>
        <h3>Login Here</h3>

        <label class="form-label">Usuario</label>
        <input class="form-control"type="text"name="usuario">

        <label class="form-label">Contraseña</label>
        <input class="form-control" type="password"name="contrasena">

        <input type="submit" class="btn btn-primary" value="Iniciar Sesion">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>