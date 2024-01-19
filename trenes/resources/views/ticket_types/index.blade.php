<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ticket Types</title>
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
    <h1>Página principal de los Ticket Types</h1>
    <p>
        <a href="{{ route('ticket_types.create') }}"> Nuevo TicketType </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo </th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($ticket_types as $ticket_type)
                <tr>
                    <td>{{ $ticket_type->id }}</td>
                    <td>{{ $ticket_type->type }}</td>
                    <td>
                        <form action="{{ route('ticket_types.show', ['ticket_type'=>$ticket_type->id])}}" method="get">
                            <input type="Submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('ticket_types.destroy', ['ticket_type'=>$ticket_type->id])}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="Submit" value="Borrar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('ticket_types.edit', ['ticket_type'=>$ticket_type->id])}}" method="get">
                            <input type="Submit" value="Editar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>