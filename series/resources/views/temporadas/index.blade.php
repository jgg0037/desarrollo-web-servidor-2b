<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, tr, td{
            border: solid violet 2px;
            border-collapse: collapse;
            text-align: center;
        }
        th{
            background-color: violet
        }
    </style>
</head>
<body>
    
    <h1>Información de Temporadas:</h1>
    <p>{{ $mensaje }}</p>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Num temporada</th>
                <th>Título temporada</th>
                <th>Num capítulos</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($temporadas as $temporada)
                <tr>
                    <td>{{ $temporada ->serie->titulo }}</td>
                    <td>{{ $temporada->numTemporada }}</td>
                    <td>{{ $temporada->tituloTemporada }}</td>
                    <td>{{ $temporada->numCapitulos }}</td>
                    <td>
                        <form action="{{ route('temporadas.show', ['temporada'=>$temporada->id])}}" method="get">
                            <input type="Submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('temporadas.destroy', ['temporada'=>$temporada->id])}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="Submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>