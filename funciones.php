<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function sumaDosV1 ($num1, $num2) {
        return $num1 + $num2;
    }
    echo sumaDosV1(3,1);

    function sumaDosV2(int $num1, int $num2) {
        return $num1 + $num2;
    }
    echo sumaDosV2(3,1);

    function sumaDosV3(int $num1, int $num2) : int {
        return $num1 + $num2;
    }
    echo sumaDosV3(3,1);

    function sumaDosV4(int|float $num1, int|float $num2) : float {
        return $num1 + $num2;
    }
    echo sumaDosV4(3,1) . "<br>";

    /*Funcion que recibe numeor entero y devuelve la suma 
    entera de todos los numeros del 1 al numero introducido */

    function sumatorio(int $numero) : int {
        $suma = 0;
        for ($i=1; $i <= $numero ; $i++) { 
            $suma += $i;
        }
        return $suma;
    }
    echo sumatorio(22) . "<br>";

    function factorial(int $numero) : int {
        $multiplicacion = 1;
        for ($i=1; $i <= $numero ; $i++) { 
            $multiplicacion *= $i;
        }
        return $multiplicacion;
    }
    echo factorial(10) . "<br>";

    /*max($array) saca el valor max del array, y luego la media */

    function array_max($array) : int {
        $max = $array[1];
        for ($i=0; $i < count($array); $i++) { 
            if ($max < $array[$i]) {
                $max = $array[$i];
            }
        }
        return $max;
    }

    function array_min($array) : int {
        $min = $array[1];
        for ($i=0; $i < count($array); $i++) { 
            if ($min > $array[$i]) {
                $min = $array[$i];
            }
        }
        return $min;
    }

    function array_media($array) : float {
        $media = 0;
        for ($i=0; $i < count($array); $i++) { 
            $media += $array[$i];
        }
        return $media / count($array);
    }

    $array = [0,1,2,3,4,5];

    echo array_max($array). "<br>";
    echo array_min($array). "<br>";
    echo array_media($array). "<br><br><br>";

    /*Funcionq ue muestre con true or false si es un numero primo*/

    function esprimo($numero) : bool {
        for ($i=2; $i <= $numero/2; $i++) { 
            if ($numero % $i == 0) {
                return false;
            }
        }
        return true;
    }
    $pregunton = 4;
    echo esprimo($pregunton). "<br><br>";
    for ($i=2; $i <= $pregunton; $i++) { 
        if (esprimo($i)) {
            echo $i . " ";
        }
    }
    echo "<br><br>";

    /*Potencia-Exponente*/ 
    function potencia(int $base, int $exponente) : int{
        $resultado = 1;
        for ($i=1; $i <= $exponente ; $i++) { 
            $resultado *= $base;
        }
        return $resultado;
    }
    echo potencia(2, 3). "<br><br>";

    //Precio con/sin IVA
    echo "ejercicios IVA <br>";
    define ("GENERAL", 21);
    define ("REDUCIDO", 10);
    define ("SUPERREDUCIDO", 4);
    define ("SIN IVA", 0);
    function precioSinIva(int $precioBase, String $tipoIVA) : float {
        $porcientoIVA = match($tipoIVA) {
            "GENERAL" => 0.21,
            "REDUCIDO" => 0.1,
            "SUPERREDUCIDO" => 0.04,
            "SIN IVA" => 0
        };
        return ($precioBase - ($precioBase * $porcientoIVA));
    };
    echo precioSinIva(100, "GENERAL") . "<br>";
    echo precioSinIva(100, "REDUCIDO") . "<br>";
    echo precioSinIva(100, "SUPERREDUCIDO") . "<br>";
    echo precioSinIva(100, "SIN IVA") . "<br>";
    function precioConIva(int $precioBase, String $tipoIVA) : float {
        $porcientoIVA = match($tipoIVA) {
            "GENERAL" => 0.21,
            "REDUCIDO" => 0.1,
            "SUPERREDUCIDO" => 0.04,
            "SIN IVA" => 0
        };
        return ($precioBase + ($precioBase * $porcientoIVA));
    };
    echo precioConIva(100, "GENERAL") . "<br>";
    echo precioConIva(100, "REDUCIDO") . "<br>";
    echo precioConIva(100, "SUPERREDUCIDO") . "<br>";
    echo precioConIva(100, "SIN IVA") . "<br>";
    echo "<br><br>";

    //Salario IRPF
    echo "ejercicios IRPF <br>";
    function reduccion (float $parte, float $irpf) : float {
        return ($parte - $parte * $irpf);
    }
    function salario (float $salarioBruto) : float {
        $tramo1 = 12450 * 0.81;
        $tramo2 = $tramo1 + (20200 - 12450) * 0.76;
        $tramo3 = $tramo2 + (35200 - 20200) * 0.7;
        $tramo4 = $tramo3 + (60000 - 35200) * 0.63;
        $tramo5 = $tramo4 + (300000 - 60000) * 0.55;
        if ($salarioBruto <= 12450) {
            return reduccion($salarioBruto, 0.19);
        }
        elseif ($salarioBruto < 20200) {
            $total = $tramo1 + reduccion($salarioBruto - 12450, 0.24);
            return $total;
        }
        elseif ($salarioBruto < 35200) {
            $total = $tramo2 + reduccion($salarioBruto - 20200, 0.30);
            return $total;
        }
        elseif ($salarioBruto < 60000) {
            $total = $tramo3 + reduccion($salarioBruto - 35200, 0.37);
            return $total;
        }
        elseif ($salarioBruto < 300000) {
            $total = $tramo4 + reduccion($salarioBruto - 60000, 0.45);
            return $total;
        }
        else {
            $total = reduccion(12450, 0.19);
            $total = $tramo5 + reduccion($salarioBruto - 300000, 0.47);
            return $total;
        }
    }
    echo salario(50000);
    //Otra forma
    function salario2(int|float $salario) : float{
        $tramo1 = 12450 * 0.81;
        $tramo2 = (20200 - 12450) * 0.76;
        $tramo3 = (35200 - 20200) * 0.7;
        $tramo4 = (60000 - 35200) * 0.63;
        $tramo5 = (300000 - 60000) * 0.55;

        $salarioFinal = match(true) {
            $salario <= 12450 
                => $salario * 0.81,
            $salario > 12450 && $salario <= 20200 
                => $tramo1 + (($salario - 12450) * 0.76),
            $salario > 20200 && $salario <= 35200 
                => $tramo1 + $tramo2 + (($salario - 20200) * 0.7),
            $salario > 35200 && $salario <= 60000 
                => $tramo1 + $tramo2 + $tramo3 + (($salario - 35200) * 0.63),
            $salario > 60000 && $salario <= 300000 
                => $tramo1 + $tramo2 + $tramo3 + $tramo4 + (($salario - 60000) * 0.55),
            $salario > 300000
                => $tramo1 + $tramo2 + $tramo3 + $tramo4 + $tramo5 + (($salario - 300000) * 0.53)      
        };
        return $salarioFinal;
    }

    ?>
</body>
</html>