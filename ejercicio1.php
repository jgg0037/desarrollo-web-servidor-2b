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
    for ($i=1; $i <= 10; $i++) { 
        echo "<table class='multiplicar' style>";
        echo "<caption>Tabla del $i</caption>";
        
        for ($j=1; $j <= 10; $j++) { 
            echo "<tr>";
            echo "<td>$i x $j = ". $i * $j ."</td>";
            echo "</tr>";
        };
        echo "</table>";
    };
    ?>
</table>
</body>
</html>