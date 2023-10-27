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
    </style>
</head>
<body>
    <?php

    $principal = [];
    $chiquito = [];
    $grandote = [];
    
    #Parte 1
    for ($i=0; $i < 10; $i++) { 
        array_push($chiquito, rand(1, 10));
    }
    for ($i=0; $i < 10; $i++) { 
        array_push($grandote, rand(10, 100));
    }
    array_push($principal, $chiquito);
    array_push($principal, $grandote);

    #Parte 2
    ?>
    <table>
    <caption>Numeros aleatorios</caption>
    <?php
    foreach ($principal as $arrayNumeros) {
        echo "<tr>";
        foreach ($arrayNumeros as  $value) {             
           echo "<td>$value</td>";
        }
        echo "</tr>";
    };
    ?>
    </table>
    <?php

    #Parte 3
    ?>
    <table>
    <caption>Valores interesantes 0-10</caption>
    <tr>
        <th>Valor Maximo</th>
        <th>Valor Minimo</th>
        <th>Media</th>
    </tr>
    <tr>
    <?php
    $candidato = $principal[0][0];
    for ($i=1; $i < 10; $i++) { 
        if ($candidato < $principal[0][$i]) {
            $candidato = $principal[0][$i];
        };
    };
        echo "<td>$candidato</td>";
    $candidato = $principal[0][0];
    for ($i=1; $i < 10; $i++) { 
        if ($candidato > $principal[0][$i]) {
            $candidato = $principal[0][$i];
        };
    };
        echo "<td>$candidato</td>";
    $media = 0;
    for ($i=1; $i < 10; $i++) { 
        $media = $media + $principal[0][$i];
        $media = $media / 10;
    };
    echo "<td>". round($media, 2) ."</td>";
    ?>
    </tr>
    </table>
</body>
</html>