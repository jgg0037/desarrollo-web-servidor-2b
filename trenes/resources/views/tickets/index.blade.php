<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tickets</title>
    <style>
        table, tr, td{
            border: solid violet 2px;
            border-collapse: collapse;
        }
        th{
            background-color: violet
        }
    </style>
</head>
<body>
    <div>
        <h3><a href="{{route('trains.index')}}">Trenes</a> | <a href="{{route('tickets.index')}}">Tickets</a> | <a href="{{route('train_types.index')}}">Tipos Trenes</a> | <a href="{{route('ticket_types.index')}}">Tipos Tickets</a></h3>
    </div>
    <h1>Página principal de los Tickets</h1>
    <p>
        <a href="{{ route('tickets.create') }}"> Nuevo Ticket </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Precio </th>
                <th>Tren</th>
                <th>Tipo de Ticket</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->date }}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->train->train_type->type }}</td> 
                    <td>{{ $ticket->ticket_type->type }}</td>  
                    <td>
                        <form action="{{ route('tickets.show', ['ticket'=>$ticket->id])}}" method="get">
                            <input type="Submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('tickets.destroy', ['ticket'=>$ticket->id])}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="Submit" value="Borrar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('tickets.edit', ['ticket'=>$ticket->id])}}" method="get">
                            <input type="Submit" value="Editar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>