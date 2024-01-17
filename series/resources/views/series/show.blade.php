<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Serie</title>
</head>
<body>
    <p>Título: {{ $serie ->titulo }}</p>
    <p>Plataforma: {{ $serie ->plataforma }}</p>
    <p>Temporadas: {{ $serie ->numTemporadas }}</p>

    <ul>
        @php
            $temporadas = $serie->temporadas;
        @endphp
        @foreach($temporadas as $temporada)
        <li>{{ $temporada->tituloTemporada }}</li>
        @endforeach
    </ul>
</body>
</html>