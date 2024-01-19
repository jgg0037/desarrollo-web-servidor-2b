<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trains</title>
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
    <h1>Página principal de los Trenes</h1>
    <p>
        <a href="{{ route('trains.create') }}"> Nuevo Tren </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Pasajeros </th>
                <th>Año de fabricación</th>
                <th>Tipo de tren</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($trains as $train)
                <tr>
                    <td>{{ $train->name }}</td>
                    <td>{{ $train->passengers }}</td>
                    <td>{{ $train->year }}</td> 
                    <td>{{ $train->train_type->type }}</td>
                    <td>
                        <form action="{{ route('trains.show', ['train'=>$train->id])}}" method="get">
                            <input type="Submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('trains.destroy', ['train'=>$train->id])}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="Submit" value="Borrar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('trains.edit', ['train'=>$train->id])}}" method="get">
                            <input type="Submit" value="Editar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
