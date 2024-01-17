<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('temporadas.store') }}" method="post">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre"><br><br>
        <label>Número de la temporada</label>
        <input type="number" name="numTemporada"><br><br>
        <label>Título de la Temporada</label>
        <input type="text" name="tituloTemporada"><br><br>
        <label>Número de capítulos</label>
        <input type="number" name="numCapitulos"><br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>