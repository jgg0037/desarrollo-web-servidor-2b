<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Ticket</title>
</head>
<body>
    <form action="{{ route('tickets.store') }}" method="post">
        @csrf
        <label>Fecha</label>
        <input type="date" name="date"><br><br>
        <label>Precio</label>
        <input type="number" name="price"><br><br>
        <label>Tren</label>
        <select name="train_id">
            @foreach ($trains as $train)
            <option value="{{ $train->id }}">{{ $train->name }}</option>
            @endforeach
        </select>
        <label>Tipo de ticket </label>
        <select name="ticket_type_id">
            @foreach ($ticket_types as $ticket_type)
            <option value="{{ $ticket_type->id }}">{{ $ticket_type->type }}</option>
            @endforeach
        </select>
        <input type="submit" value="Crear">
    </form>
</body>
</html>