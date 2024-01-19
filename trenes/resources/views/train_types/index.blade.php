<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Train Types</title>
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
    <div>
        <h3><a href="{{route('trains.index')}}">Trenes</a> | <a href="{{route('tickets.index')}}">Tickets</a> | <a href="{{route('train_types.index')}}">Tipos Trenes</a> | <a href="{{route('ticket_types.index')}}">Tipos Tickets</a></h3>
    </div>
    <h1>Página principal de los Train Types</h1>
    <p>
        <a href="{{ route('train_types.create') }}"> Nuevo TrainType </a>
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
            @foreach($train_types as $train_type)
                <tr>
                    <td>{{ $train_type->id }}</td>
                    <td>{{ $train_type->type }}</td>
                    <td>
                        <form action="{{ route('train_types.show', ['train_type'=>$train_type->id])}}" method="get">
                            <input type="Submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('train_types.destroy', ['train_type'=>$train_type->id])}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="Submit" value="Borrar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('train_types.edit', ['train_type'=>$train_type->id])}}" method="get">
                            <input type="Submit" value="Editar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>