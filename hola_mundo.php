<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, tr, caption, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <!-- Comentario HTML -->
    <?php
        // Comentarios /* en blq */ # Una linea
        echo "<h1 >Hola mundo!</h1>"; //Print
        $entero = 1; #int
        $decimal = 1.5; #float
        $exponente = 3e5; #float (3 x 10^5)
        $string0 = "mundo"; #string
        $string1 = "Hola $string0"; #permite meter variables
        $string2 = 'Hola $string0'; #no permite variables
        $string3 = 'Hola ' . $string0; #concatena
        $booleano = true; #booleano
        $array1 = [1,2,3]; #array

        define("EDAD", 25); #constante

        echo "<br>"; #salto de linea
        var_dump($string1); #escribe el Tipo de dato(valor)

        echo "<h3>Estructuras basicas</h3>";
        #Estructura IF
        $dia = date("d");
        if ($dia <= 15){
            echo "Estamos a principios de mes";
        }   else {
            echo "Estamos a finales de mes";
        } 
        echo "<br>";

        #estructura SWITCH
        $n = rand(1,3);
        switch ($n) {
            case 1:
                echo "$n es igual a 1";
                break;
            case 2:
                echo "$n es igual a 2";
                break;
            case 3:
                echo "$n es igual a 3";
                break;
            default:
                echo "Qué has hecho loco?";
                break;
        }
        echo "<br>";

        echo "<h4>Utiles</h4>";
        #fecha
        $fecha = date("j F Y");
        echo $fecha;

        #random
        $random = rand(1,150);
        echo "<br>";
        #ejercicio random dice cuántas cifras tiene el random
        $numeraco = rand(1,150);
        echo "el número es $numeraco y tiene " . strlen($numeraco) . " digitos";

        echo "<br>";
        
        #Switch feo
        $hoyes = date("l");
        switch ($hoyes) {
            case "Monday":
                echo "Hoy es Lunes";
                break;
            case "Tuesday":
                echo "Hoy es Martes";
                break;
            case "Wednesday":
                echo "Hoy es Miercoles";
                break;
            case "Thursday":
                echo "Hoy es Jueves";
                break;
            case "Friday":
                echo "Hoy es Viernes";
                break;
            case "Saturday":
                echo "Hoy es Sabado";
                break;
            case "Sunday":
                echo "Hoy es Domingo";
                break;
        }
        echo "<br>";
        #Más guapo
        $dia = date("l");
        $dia_es = match($dia) {
            "Monday" => "Lunes",
            "Tuesday" => "Martes",
            "Wednesday" => "Miercoles",
            "Thursday" => "Jueves",
            "Friday" => "Viernes",
            "Saturday" => "Sabado",
            "Sunday" =>  "Domingo"
            //...
        };

        $mes = (int)(date ("n"));
        $mes_es = match($mes) {
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Nobiembre",
            12 => "Diciembre",
        };
        echo "Hoy es $dia_es " . date("j") . " de $mes_es";
        echo "<br><br>";

        #while
        $i = 0;
        while ($i <= 5) {
            echo $i;
            $i ++;
            echo "<br>";
        }
        #Otra forma de while
        while ($i <=10) :
            echo $i++;
        endwhile;
        echo "<br>";
        #DO while
        do {
            echo $i . "<br>";
            $i++;
        } while ($i <=15);
        #for
        for ($i=0; $i < 5; $i++) { 
            echo $i;
        }
        echo "<br>";
        #for raro
        for ($i=0;; $i++) { 
            if ($i >= 5) {
                break;
            }
            echo $i . "<br>";
        };
        #otro for
        for ($i=1; $i <= 50; $i++) { 
            if ($i % 3 == 0) {
                echo $i . ",";
            };
        };

        
        echo "<h3>Fin de los bucles</h3>";
        #Arrays
        $array1 = array(
            'key1' => 'value1',
            'key2' => 'value2',
            'key3' => 'value3'
        );

        $array2 = [
            'value1', 'value2', 'value3'
        ];

        print_r($array2);

        #para meter nuevos valores:
        $array1['key4'] = 'value4';
        $array2[] = 'value4';

        #para recorrer el array:
        foreach ($array1 as $valores) {
            echo $valores . "<br>";
            # code...
        }
        echo "<br>";

        #Array con arrays
        $usuarios = [
            [1,2,3,4],
            [5,6,7,8],
            [9,10,11,12]
        ];


        echo "<h3>Ejercicios</h3>";

        #ejercicio de if con fecha
        $hora = date("G");
        if ($hora < 12) {
            echo "Buenos días";
        }
        elseif (($hora >= 12)&&($hora < 20)) {
            echo "Buenas tardes";
        }
        else {
            echo "Buenas noches";
        };
        echo "<br>";

        #Ejercicio1
        $detecta = rand(1,10);
        if ($detecta % 2 == 0) {
            echo "$detecta es par";
        }
        else {
            echo "$detecta es impar";
        };

        echo "<br><br>";

        #Ejercicio2
        $detecta = rand(-10,10);
        if ($detecta < 0) {
            echo "$detecta es menor que 0";
        }
        elseif ($detecta == 0) {
            echo "$detecta es igual a 0";
        }
        else {
            echo "$detecta es mayor que 0";
        }
        echo "<br><br>";

        #Ejercicio 3
        echo "<ul>";
        for ($i=1; $i <= 20 ; $i++) { 
            if ($i % 2 !=0) {
                echo "<li>" . $i ."</li>";
            }
        }
        echo "</ul>";

        #Ejercicio 
        echo "[";
        $limite = 50;
        for ($i=1; $i <= $limite ; $i++) { 
            if ($i % 3 == 0) {
                echo $i;
                if (($i + 3) <= $limite) {
                    echo ",";
                }
            }
        }
        echo "]";
        echo "<br>";
        #ahora con while
        $i = 1;
        echo "[";
        $limite = 50;
        while ($i <= $limite) {
            if ($i % 3 == 0) {
                echo $i;
                if (($i + 3) <= $limite) {
                    echo ",";
                }
            }
            $i++;
        }
        echo "]";
        echo "<br>";
        #suma de todos los pares de 0 a 20
        $suma = 0;
        for ($i=0; $i <= 20; $i++) { 
            if ($i % 2 == 0) {
                $suma += $i;
            }
        }
        echo "la suma es: $suma";
        echo "<br>";

        #Primos
        $contador = 0;
        for ($i=1; $contador <= 50; $i++) { 
            $contador2 = 0;
            for ($j=1; $j <= $i; $j++) { 
                if ($i % $j == 0) {
                    $contador2 ++;
                }
            }
            if ($contador2 <= 2) {
                echo "$i, ";
                $contador ++;
            }
        }

    #Arrays DNI
    $arrayDNI = array(
        '11111111H' => 'Julio',
        '22222222J' => 'Antonio',
        '33333333P' => 'Jose'
    );
    echo "<br><br>";
    #recorrerlo
    foreach ($arrayDNI as $key => $persona) {
        echo $key  . " => " . $persona . "<br>";
    }
    echo "<br><br>";
    #Ahora en tabla
    ?>
    <table class="dni" style>
        <caption>Personas</caption>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        krsort ($arrayDNI);
        
        foreach ($arrayDNI as $key => $persona) {
            echo "<tr>";;
            echo "<td>$key</td>";
            echo "<td>$persona</td>";
            echo "</tr>";
        };
        ?>
    <?php
    echo "<br><br>";
        #tabla sacando arrays
    $arrayJuegos = [
        ["Pacman", "Atari", 60],
        ["Fortnite", "PS4", 0],
        ["Mario Kart", "Super Nintendo", 70],
        ["Street Fighter", "PS4", 50],
        ["Legend of Zelda", "Nintendo 64", 40],
        ["Castelvania", "Nintendo 64", 55]
    ];
    ?>
    <table class="juegos" style>
        <caption>Jueguitos</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Consola</th>
                <th>Puntuacion</th>
            </tr>
        </thead>
        <?php
        foreach ($arrayJuegos as $juego) {
            list ($contrasenaUsuario, $consola, $puntuacion) = $juego;
            echo "<tr>";
            echo "<td>$contrasenaUsuario</td>";
            echo "<td>$consola</td>";
            echo "<td>$puntuacion</td>";
            echo "</tr>";
        };
        ?>
    </table>
    <?php
    echo "<br><br>";
    #meter un juego en array
    $nuevo_productos = ["Minecraft", "PC", 20];
    array_push($arrayJuegos, $nuevo_productos);
    #ahora ordenando
    $contrasenaUsuario = array_column($arrayJuegos, 0);
    $consola = array_column($arrayJuegos, 1);
    array_multisort($consola, SORT_ASC, $contrasenaUsuario, SORT_ASC, $arrayJuegos);
    ?>
    <table class="juegos" style>
        <caption>Jueguitos</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Consola</th>
                <th>Puntuacion</th>
            </tr>
        </thead>
        <?php
        foreach ($arrayJuegos as $juego) {
            list ($contrasenaUsuario, $consola, $puntuacion) = $juego;
            echo "<tr>";
            echo "<td>$contrasenaUsuario</td>";
            echo "<td>$consola</td>";
            echo "<td>$puntuacion</td>";
            echo "</tr>";
        };
        ?>
    </table>
    <?php
    #Añadimos columna
    echo "<br><br>";
    for ($i=0; $i < count($arrayJuegos); $i++) { 
        $arrayJuegos[$i][count($arrayJuegos[$i])] = rand(1,10);
    };

    ?>
    <table class="juegos" style>
        <caption>Jueguitos</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Consola</th>
                <th>Puntuacion</th>
                <th>Stok</th>
            </tr>
        </thead>
        <?php
        foreach ($arrayJuegos as $juego) {
            list ($contrasenaUsuario, $consola, $puntuacion, $stok) = $juego;
            echo "<tr>";
            echo "<td>$contrasenaUsuario</td>";
            echo "<td>$consola</td>";
            echo "<td>$puntuacion</td>";
            echo "<td>$stok</td>";
            echo "</tr>";
        };
        ?>
    </table>
    <?php
    #Array de pares del 1 al 50, muestralos
    #barajalos y luego muestra en orden descendente
    $arrayDePares = [];
    for ($i=1; $i <= 50; $i++) { 
        if ($i % 2 == 0) {
            array_push($arrayDePares, $i);
        }
    }
    for ($i=0; $i < count($arrayDePares); $i++) { 
        echo $arrayDePares[$i] ." ";
    }
    echo "<br>Ahora shuffled:  ";
    shuffle($arrayDePares);
    foreach ($arrayDePares as $value) {
        echo $value . " ";
    }
    echo "<br>Ahora ordenao:  ";
    rsort($arrayDePares);
    foreach ($arrayDePares as $value) {
        echo $value . " ";
    }
    echo "<br><br>";
    $numeRandom = [];
    for ($i=0; $i < 10; $i++) { 
        $random = rand(0, 100);
        array_push($numeRandom, $random);
    }
    echo "Original: ";
    foreach ($numeRandom as $value) {
        echo $value . " ";
    }
    echo"<br>";
    echo "Mayor a menor: ";
    rsort($numeRandom);
    foreach ($numeRandom as $value) {
        echo $value . " ";
    }
    echo"<br>";
    echo "Menor a mayor: ";
    asort($numeRandom);
    foreach ($numeRandom as $value) {
        echo $value . " ";
    }
    echo"<br>";
    echo"<br>";
    #ejercicio 4 Arrays
    echo "<p>Ejercicio tablas</p>";
    $arraySeries = [
        ["Geo", "Amazon Prime", 1],
        ["Arcane", "Netflix", 1],
        ["Kimetsu no Yaiba", "Crunchiroll", 3],
        ["Game of Thrones", "HBO", 8],
        ["New Amsterdam", "Netflix", 2],
        ["Naruto", "Crunchiroll", 2]
    ];
    ?>
    <table class="Series" style>
        <caption>Series normal</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <?php
        foreach ($arraySeries as $serie) {
            list ($contrasenaUsuario, $plataforma, $temporadas) = $serie;
            echo "<tr>";
            echo "<td>$contrasenaUsuario</td>";
            echo "<td>$plataforma</td>";
            echo "<td>$temporadas</td>";
            echo "</tr>";
        };
        ?>
    </table>
    <?php
    echo"<br>";
    $contrasenaUsuario = array_column($arraySeries, 0);
    $temporadas = array_column($arraySeries, 2);
    array_multisort($temporadas, SORT_ASC, $contrasenaUsuario, SORT_ASC, $arraySeries);
    ?>
    <table class="Series" style>
        <caption>Series por temporadas</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <?php
        foreach ($arraySeries as $serie) {
            list ($contrasenaUsuario, $plataforma, $temporadas) = $serie;
            echo "<tr>";
            echo "<td>$contrasenaUsuario</td>";
            echo "<td>$plataforma</td>";
            echo "<td>$temporadas</td>";
            echo "</tr>";
        };
        ?>
    </table>
    <?php
    echo"<br>";
    $contrasenaUsuario = array_column($arraySeries, 0);
    $plataforma = array_column($arraySeries, 1);
    array_multisort($plataforma, SORT_ASC, $contrasenaUsuario, SORT_ASC, $arraySeries);
    ?>
    <table class="Series" style>
        <caption>Series por plataforma</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <?php
        foreach ($arraySeries as $serie) {
            list ($contrasenaUsuario, $plataforma, $temporadas) = $serie;
            echo "<tr>";
            echo "<td>$contrasenaUsuario</td>";
            echo "<td>$plataforma</td>";
            echo "<td>$temporadas</td>";
            echo "</tr>";
        };
        ?>
    </table>
    <?php
    $suma = 0;
    for ($i=0; $i < count($arraySeries); $i++) { 
        $suma += (int)$arraySeries[$i][2];
    }
    $media = $suma / count($arraySeries);
    echo "Total de temporadas: $suma";
    echo"<br>";
    echo "Media de temporadas: $media";
    echo"<br>";
    echo"<br>";
    #ejercicio 5 Arrays
    echo "<p>Ejercicio estudiantes</p>";
    $arrayEstudiantes = [
        ["Diego", 0, "No calificado"],
        ["Adrian", 0, "No calificado"],
        ["Julio", 0, "No calificado"],
        ["Hugo", 0, "No calificado"],
    ];
    for ($i=0; $i < count($arrayEstudiantes); $i++) { 
        $arrayEstudiantes[$i][1] = rand(0,10);
        if ($arrayEstudiantes[$i][1] < 5) {
            $arrayEstudiantes[$i][2] = "Suspenso";
        } elseif ($arrayEstudiantes[$i][1] < 7) {
            $arrayEstudiantes[$i][2] = "Aprobado";
        } elseif ($arrayEstudiantes[$i][1] < 9) {
            $arrayEstudiantes[$i][2] = "Notable";
        } else {
            $arrayEstudiantes[$i][2] = "Sobresaliente";
        }
    }
    ?>
    <table class="Alumnos" style>
        <caption>Alumnos y notas</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nota</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <?php
        foreach ($arrayEstudiantes as $estudiante) {
            list ($contrasenaUsuario, $nota, $calificacion) = $estudiante;
            echo "<tr>";
            echo "<td>$contrasenaUsuario</td>";
            echo "<td>$nota</td>";
            echo "<td>$calificacion</td>";
            echo "</tr>";
        };
        ?>
    </table>
    <?php

    ?>
</body>
</html>