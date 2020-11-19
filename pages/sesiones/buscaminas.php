<?php
/**
 * Buscaminas
 * @author Cristina Prieto Jalao
 * 17/11/2020
 */
$FILAS = 8; //8
$COLUMNAS = 10; //10
$BOMBAS = 10;
$tablero = array();

function crearTablero($tablero, $filas, $columnas){
    for($i=0; $i<$filas; $i++){
        array_push($tablero, array());
        for($j=0; $j<$columnas; $j++){
            array_push($tablero[$i], "0");
        }
    }
    return $tablero;
}

function ponerBombas($tablero, $bombas, $filas, $columnas){
    $bombasColocadas = 0;
    do{
        $fRandom = rand(0, $filas - 1);
        $cRandom = rand(0, $columnas - 1);
        if($tablero[$fRandom][$cRandom] == "0"){
            $tablero[$fRandom][$cRandom] = "*";
            $bombasColocadas++;
        }
    }while($bombasColocadas < $bombas);

    for($i=0; $i<$filas; $i++){
        for($j=0; $j<$columnas; $j++){
            if($tablero[$i][$j] != "*"){
                for($k=$i-1; $k<=($i+1); $k++){
                    for($l=$j-1; $l<=($j+1); $l++){
                        if($k >= 0 && $l >= 0 && $k < $filas && $l < $columnas){
                            if($tablero[$k][$l] == "*"){
                                $tablero[$i][$j]++;
                            }
                        }
                    }
                }
            }
        }
    }
    return $tablero;
}

function imprimirTablero($tablero){
    echo "<table border=\"1px solid black\">";
    foreach($tablero as $fila => $columna){
        echo "<tr>";
        foreach($columna as $key => $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
$tablero = crearTablero($tablero, $FILAS, $COLUMNAS);
$tablero = ponerBombas($tablero, $BOMBAS, $FILAS, $COLUMNAS);
imprimirTablero($tablero);
// print_r($tablero);

?>