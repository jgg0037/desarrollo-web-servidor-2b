<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Serie</title>
</head>
<body>
    <form action="{{ route('series.update', ['series'=>$serie->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Título</label>
        <input type="text" name="titulo" value="{{$serie->titulo}}" ><br><br>
        <label>Plataforma</label>
        <input type="text" name="plataforma" value="{{$serie->plataforma}}"><br><br>
        <label>Temporadas</label>
        <input type="number" name="numTemporadas" value="{{$serie->numTemporadas}}"><br><br>
        <input type="submit" value="Editar">
    </form>
</body>
</html>