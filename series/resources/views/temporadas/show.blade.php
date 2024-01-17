<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Temporada</title>
</head>
<body>
    <p>Nombre Serie: {{ $temporada ->nombre }}</p>
    <p>Número de la temporada: {{ $temporada ->numTemporada }}</p>
    <p>Nombre de la temporada: {{ $temporada ->tituloTemporada }}</p>
    <p>Número de capítulos: {{ $temporada ->numCapitulos }}</p>
</body>
</html>