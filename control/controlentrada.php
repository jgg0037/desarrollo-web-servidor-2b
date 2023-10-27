<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<form action="" method="post">
		<label for="url">Introduce un DNI:</label>
		<input type="text" name="dni" id="dni" pattern="[0-9]{8}[a-zA-Z]{1}" title="El DNI tiene 8 dígitos y 1 letra">
		<input type="submit" value="Comprobar">
	</form>
</body>
</html>