<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Temporada</title>
</head>
<body>
    <form action="{{ route('temporadas.update', ['temporada'=>$temporada->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Nombre</label>
        <input type="text" name="titulo" value="{{$temporada->nombre}}" ><br><br>
        <label>Número de temporada</label>
        <input type="number" name="plataforma" value="{{$temporada->numTemporada}}"><br><br>
        <label>Título de temporada</label>
        <input type="text" name="temporadas" value="{{$temporada->tituloTemporada}}"><br><br>
        <label>Número de capítulos</label>
        <input type="number" name="temporadas" value="{{$temporada->numCapitulos}}"><br><br>
        <input type="submit" value="Editar">
    </form>
</body>
</html>