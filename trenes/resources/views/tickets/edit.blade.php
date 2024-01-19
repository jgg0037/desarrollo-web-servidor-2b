<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Ticket</title>
</head>
<body>
    <form action="{{ route('tickets.update', ['ticket'=>$ticket->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Fecha</label>
        <input type="text" name="date" value="{{$ticket->date}}" ><br><br>
        <label>Precio</label>
        <input type="text" name="price" value="{{$ticket->price}}"><br><br>
        <label>Tren perteneciente</label>
        <input type="number" name="train_id" value="{{$ticket->train_id}}"><br><br>
        <label>Tipo de ticket </label>
        <select name="ticket_type_id">
            @foreach ($ticket_types as $ticket_type)
            <option value="{{ $ticket_type->id }}">{{ $ticket_type->type }}</option>
            @endforeach
        </select>
        <input type="submit" value="Editar">
    </form>
</body>
</html>