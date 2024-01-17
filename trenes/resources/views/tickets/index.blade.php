<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tickets</title>
    <style>
        table, tr{
            border: solid violet 2px;
            border-collapse: collapse;
        }
        th{
            background-color: violet
        }
    </style>
</head>
<body>
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
                    <td>{{ $ticket->price }}</td>                                  <!--AQUI BICHO -->
                    <td>@php
                        switch ($ticket->type) {
                            case 1:
                                echo "Billete sencillo";
                                break;
                            case 2:
                                echo "Abono mensual";
                                break;
                            case 3:
                                echo "Abono trimestral";
                                break;
                            default:
                                
                                break;
                        }
                    @endphp</td>
                    <td>
                        <form action="{{ route('tickets.show', ['tickets'=>$ticket->id])}}" method="get">
                            <input type="Submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('tickets.destroy', ['tickets'=>$ticket->id])}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="Submit" value="Borrar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('tickets.edit', ['tickets'=>$ticket->id])}}" method="get">
                            <input type="Submit" value="Editar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>