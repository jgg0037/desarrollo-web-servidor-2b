<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Tren</title>
</head>
<body>
    <p>Nombre: {{ $train ->name }}</p>
    <p>Pasajeros: {{ $train ->passengers }}</p>
    <p>Año Fabricación: {{ $train ->year }}</p>
    <p>Tipo de Tren: {{ $train ->train_type_id }}</p>
</body>
</html>