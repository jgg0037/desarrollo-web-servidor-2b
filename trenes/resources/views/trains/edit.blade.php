<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Tren</title>
</head>
<body>
    <form action="{{ route('trains.update', ['train'=>$train->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Nombre</label>
        <input type="text" name="name" value="{{$train->name}}" ><br><br>
        <label>Pasajeros</label>
        <input type="text" name="passengers" value="{{$train->passengers}}"><br><br>
        <label>Año Fabricación</label>
        <input type="text" name="year" value="{{$train->year}}"><br><br>
        <label>Tipo de tren</label>
        <select name="train_type_id">
            @foreach ($train_types as $train_type)
            <option value="{{ $train_type->id }}">{{ $train_type->type }}</option>
            @endforeach
        </select>
        <input type="submit" value="Editar">
    </form>
</body>
</html>