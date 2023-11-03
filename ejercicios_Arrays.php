<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: verdana;
        }
        table, td, tr, caption, th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px 5px 8px 5px;
            text-align: center;
        }

        th {
            background-color: #ccc;
        }
        caption {
            background-color: tomato;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        tr:last-child{
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        td:last-child{
            background-color: salmon;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Comentario HTML -->
    <?php
/* 1. Crea un array que almacene nombres de productos y sus respectivos precios.
Muestra en una tabla los productos con sus precios, ordenados alfabéticamente por
el nombre del producto. Muestra también el precio total de todos los productos y
cuántos productos hay en el array. */
echo "<p>Ejercicio productos</p>";
$arrayComponentes = [
    ["Intel i-7 8700k", 40],
    ["RTX 3080", 60],
    ["SSD 1TB", 4],
    ["RAM Corsair 16GB", 7]
];
$contrasena = array_column($arrayComponentes, 0);
$contrasena = array_column($arrayComponentes, 1);
array_multisort($contrasena, SORT_ASC, $contrasena, SORT_ASC, $arrayComponentes);
?>
<table class="componentes" style>
    <caption>Componentes</caption>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
    </thead>
    <?php
    foreach ($arrayComponentes as $componentes) {
        list ($contrasena, $contrasena) = $componentes;
        echo "<tr>";
        echo "<td>$contrasena</td>";
        echo "<td>$contrasena</td>";
        echo "</tr>";
    };
    ?>
</table>
<?php
$suma = 0;
    for ($i=0; $i < count($arrayComponentes); $i++) { 
        $suma += (int)$arrayComponentes[$i][1];
    }
    $cantidadProductos = count($arrayComponentes);
    echo "Precio total: $suma";
    echo"<br>";
    echo "Cantidad de productos: $cantidadProductos";
    echo"<br>";
    echo"<br>";

/* 2. Modifica el array anterior para que además de los productos y sus precios almacene
la cantidad que se ha comprado de cada producto. Muestra en una columna
adicional el precio total de cada producto (producto x cantidad) y al final de la tabla el
precio total de todos los productos comprados y la cantidad de productos adquiridos. */

#Stock
for ($i=0; $i < count($arrayComponentes); $i++) { 
    $arrayComponentes[$i][count($arrayComponentes[$i])] = rand(1,10);
};
#Precio total
for ($i=0; $i < count($arrayComponentes); $i++) { 
    $arrayComponentes[$i][count($arrayComponentes[$i])] = $arrayComponentes[$i][1] * $arrayComponentes[$i][2];
};
#Tabla
?>
<table class="componentes" style>
    <caption>Componentes</caption>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Precio total</th>
        </tr>
    </thead>
    <?php
    foreach ($arrayComponentes as $componentes) {
        list ($contrasena, $contrasena, $stock, $precioTotal) = $componentes;
        echo "<tr>";
        echo "<td>$contrasena</td>";
        echo "<td>$contrasena</td>";
        echo "<td>$stock</td>";
        echo "<td>$precioTotal</td>";
        echo "</tr>";
    };
    ?>
</table>
<?php
for ($i=0; $i < count($arrayComponentes); $i++) { 
    $suma += (int)$arrayComponentes[$i][3];
}
for ($i=0; $i < count($arrayComponentes); $i++) { 
    $cantidadProductos += (int)$arrayComponentes[$i][2];
}
    echo "Precio total: $suma";
    echo"<br>";
    echo "Cantidad de productos: $cantidadProductos";
    echo"<br>";
    echo"<br>";

/* 3. Crea un array que contenga los números del 1 al 50. Elimina mediante un bucle y la
función unset los números que sean divisibles entre 3. */

$arrayNumeros = [];
for ($i=1; $i <= 50; $i++) { 
    $arrayNumeros [$i] = $i;
}
foreach ($arrayNumeros as $value) {
    if ($value % 3 == 0) {
        unset($arrayNumeros[$value]);
    }
}
echo "Array sin multiplos de 3: ";
foreach ($arrayNumeros as $value) {
    echo "$value ";
}
echo"<br>";
echo"<br>";

/* 4. Crea un array de dos dimensiones que contenga el nombre de cada persona, su
apellido y su edad, que será un número aleatorio entre 0 y 100. Muestra los datos en
una tabla que además contenga una columna que indique si la persona es menor de
edad, mayor de edad, o está jubilada (+65 años). Utiliza la estructura match. */

$personas = [
    ["Juan", "Pérez", rand(0, 100)],
    ["María", "Gómez", rand(0, 100)],
    ["Pedro", "López", rand(0, 100)]
];
echo "<table>";
echo "<tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Estado</th>
    </tr>";

foreach ($personas as $persona) {
    echo "<tr>";
    echo "<td>" . $persona[0] . "</td>";
    echo "<td>" . $persona[1] . "</td>";
    echo "<td>" . $persona[2] . "</td>";
    
    $estado = match (true) {
        $persona[2] < 18 => "Menor de edad",
        $persona[2] >= 18 && $persona[2] < 65 => "Mayor de edad",
        $persona[2] >= 65 => "Jubilado"
    };
    
    echo "<td>" . $estado . "</td>";
    echo "</tr>";
}

echo "</table>";
echo"<br>";
echo"<br>";
/* 5. Crea un array que contenga el DNI y el nombre de cada persona. Muestra esa
información en una tabla en la que además indiques si el DNI introducido es
correcto. Un DNI será correcto cuando tenga exactamente 9 caracteres. */

$personas = [
    ["12345678A","Juan"],
    ["87654321B","María"],
    ["1234C", "Pedro"]
];

echo "<table>";
echo "<tr><th>DNI</th><th>Nombre</th><th>Estado</th></tr>";

foreach ($personas as $persona) {
    echo "<tr>";
    echo "<td>" . $persona[0] . "</td>";
    echo "<td>" . $persona[1] . "</td>";
    
    $estado = (strlen($persona[0]) === 9) ? "Correcto" : "Incorrecto";
    
    echo "<td>" . $estado . "</td>";
    echo "</tr>";
}

echo "</table>";

?>
</body>
</html>