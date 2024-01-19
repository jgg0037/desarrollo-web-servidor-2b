<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Ticket</title>
</head>
<body>
    <p>Fecha: {{ $ticket ->date }}</p>
    <p>Precio: {{ $ticket ->price }}</p>
    <p>Tren perteneciente: {{ $ticket ->train_id }}</p>
    <p>Tipo ticket: {{ $ticket ->ticket_type_id }}</p>
</body>
</html>