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
      
    $temperaturas = [
        ["Málaga", 20, 27],
        ["Sevilla", 17, 36],
        ["Cádiz", 19, 31],
        ["Jaén", 19, 33],
        ["Granada", 12, 35],
        ["Almería", 20, 27],
        ["Huelva", 16, 33]
    ];

    #Parte 1
    for ($i=0; $i < count($temperaturas); $i++) { 
        $temperaturas[$i][count($temperaturas[$i])] = ($temperaturas[$i][1] + $temperaturas[$i][2]) / 2;
    };

    #Parte 2
    $tempMinima = array_column($temperaturas, 1);
    $nombreProvincia = array_column($temperaturas, 0);
    array_multisort($tempMinima, SORT_ASC, $nombreProvincia, SORT_ASC, $temperaturas);

    #parte 3
    echo "<table>";
    echo "<caption>Temperaturas Andalucia</caption>";
        
    foreach ($temperaturas as $provincia) {
        list ($columnaNombreProvincia, $columnaTempMinima, $columnaTempMaxima, $columnaMedia) = $provincia;
        echo "<tr>";
        echo "<td>$columnaNombreProvincia</td>";
        echo "<td>$columnaTempMinima</td>";
        echo "<td>$columnaTempMaxima</td>";
        echo "<td>$columnaMedia</td>";
        echo "</tr>";
        };
    echo "</table>";

    #Parte 4
    ?>
    <table>
    <caption>Temperatura media de Andalucia</caption>
    <tr>
        <th>Maxima</th>
        <th>Minima</th>
    </tr>
    <tr>
        <?php
        $tempMinima = 0;
        for ($i=0; $i < count($temperaturas); $i++) { 
            $tempMinima += $temperaturas[$i][1];
        }
        $tempMinima = $tempMinima / count($temperaturas);
        echo "<td>". round($tempMinima, 2) ."</td>";
        $tempMaxima = 0;
        for ($i=0; $i < count($temperaturas); $i++) { 
            $tempMaxima += $temperaturas[$i][2];
        }
        $tempMaxima = $tempMaxima / count($temperaturas);
        echo "<td>". round($tempMaxima, 2) ."</td>"; 
        ?>
    </tr>
    </table>
    <?php

    ?>
</body>
</html>