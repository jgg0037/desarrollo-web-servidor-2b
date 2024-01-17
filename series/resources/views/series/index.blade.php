<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <h1>Página principal de las series</h1>
    <p>{{ $mensaje }}</p>

    <p>
        <a href="{{ route('series.create') }}"> Nueva Serie </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
                <tr>
                    <td>{{ $serie->titulo }}</td>
                    <td>{{ $serie->plataforma }}</td>
                    <td>{{ $serie->numTemporadas }}</td>
                    <td>
                        <form action="{{ route('series.show', ['series'=>$serie->id])}}" method="get">
                            <input type="Submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('series.destroy', ['series'=>$serie->id])}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="Submit" value="Borrar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('series.edit', ['series'=>$serie->id])}}" method="get">
                            <input type="Submit" value="Editar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>