<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Tipo de Tren</title>
</head>
<body>
    <form action="{{ route('train_types.update', ['train_type'=>$train_type->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Tipo</label>
        <input type="text" name="type" value="{{$train_type->type}}" ><br><br>
        <input type="submit" value="Editar">
    </form>
</body>
</html>