<?php
function cambiarDivisa (float $cantidad, String $origen, String $destino) : float {
    if ($origen == "€") {
        if ($destino == "$") {
            return $cantidad * 1.06;
        } elseif ($destino == "Y") {
            return $cantidad * 157.56;
        }
    } elseif ($origen == "$") {
        if ($destino == "€") {
            return $cantidad * 0.94;
        } elseif ($destino == "Y") {
            return $cantidad * 148.73;
        }
    } elseif ($origen == "Y") {
        if ($destino == "$") {
            return $cantidad * 0.0067;
        } elseif ($destino == "€") {
            return $cantidad * 0.0063;
        }
    }
    return $cantidad;
}
function sumatorio (int $numero) : int {
    $resultado = 0;
    for ($i=0; $i <= $numero ; $i++) { 
        $resultado += $i;
    }
    return ($resultado);
}
function factorial (int $numero) : int {
    $resultado = 0;
    for ($i=1; $i <= $numero ; $i++) { 
        $resultado *= $i;
    }
    return ($resultado);
}
function comprobarEstado($ejemplares) {
    if ($ejemplares == 0) {
        return "Extinto";
    } elseif ($ejemplares > 0 && $ejemplares <= 500) {
        return "En peligro crítico";
    } elseif ($ejemplares > 500 && $ejemplares <= 2000) {
        return "En peligro";
    } elseif ($ejemplares > 2000) {
        return "Amenazado";
    }
}
function buscarAnimal(String $nombre, array $animales){
    foreach ($animales as $animal) {
        if ($animal[0] == $nombre) {
            return "El $nombre está en " . comprobarEstado($animal[2]);
        }
    }
    return "No existe la especie $nombre";
}

?>