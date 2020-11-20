<?php
/**
 * Funciones para buscaminas
 * @author Cristina Prieto Jalao
 * 19/11/2020
 */

/**
 * Función que crea tablero de la dimensión dada
 * @param tablero , tablero es un array donde se almacena el tablero
 * @param filas , número de filas del tablero
 * @param columnas ,número de columnas del tablero
 * @return tablero , tablero creado con filas y columnas
 */
function crearTablero($tablero, $filas, $columnas){
    $tablero = array();
    for($i=0; $i<$filas; $i++){
        array_push($tablero, array());
        for($j=0; $j<$columnas; $j++){
            array_push($tablero[$i], "0");
        }
    }
    return $tablero;
}

/**
 * Función que crea tableros de la dimensión dada
 * @param tablero , tablero es un array donde se almacena el tablero
 * @param filas , número de filas del tablero
 * @param columnas ,número de columnas del tablero
 * @return tablero , tablero creado con filas y columnas
 */
function crearTableroVisible($tablero, $filas, $columnas){
    $tablero = array();
    for($i=0; $i<$filas; $i++){
        array_push($tablero, array());
        for($j=0; $j<$columnas; $j++){
            array_push($tablero[$i], "<input type=\"submit\" value=\" \">");
        }
    }
    return $tablero;
}

/**
 * Función para poner bombas en el tablero y modificar las casillas adyacentes
 * @param tablero , tablero donde se almacena las bombas y las casillas modificadas
 * @param bombas , número de bombas que se van a colocar
 * @param filas , número de filas del tablero
 * @param columnas ,número de columnas del tablero
 * @return tablero , tablero con las modificaciones
 */
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

/**
 * Función para imprimir el tablero
 * @param tablero , tablero es un array
 */
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

/**
 * Función para
 */
function imprimirTableroVisible($tablero, $tableroVisible, $filas, $columnas){
    echo "<table border=\"1px solid black\">";
    for($i=0; $i < $filas; $i++) {
        echo "<tr>";
        for($j = 0; $j < $columnas; $j++) {
            echo "<td>";
            if ($tableroVisible[$i][$j] == 1) {  //Si la casilla ya está visible
                if ($tablero[$i][$j] == 0) { 
                    echo "0"; //Mostramos vacío
                }
                else { 
                    echo $tablero[$fila][$columna]; //Mostramos minas adyacentes.
                }
            }
            else { // Casilla no visible
                echo "<a href=\"index.php?page=buscaminas&fila=$i&columna=$j\">";	 //Mostramos enlace			
                echo $tableroVisible[$i][$j];
                echo "</a>";				
            }
            echo "</td>";
        }
        echo "</tr>";
    }	
    echo "</table>";
}

function checkVictoria($tableroVisible, $filas, $columnas, $bombas){
    $hasGanado = false;
	$numOcultos = 0;
	$numVisibles = 0;
	foreach ($tableroVisible as $ind=>$valF) {
        foreach ($valF as $ind2=>$valor) {
            if ($valor==0) {
		        $numOcultos++;
		    }else {
		        $numVisibles++;
		    }
	    }
	}
    if ($numVisibles == $filas * $columnas - $bombas) {
        $hasGanado = true;
    }
    return $hasGanado;
}

function clickCasilla($tablero, $tableroVisible, $f, $c, $filas, $columnas, $bombas){
    if ($tableroVisible[$f][$c] == 0) {
		$tableroVisible[$f][$c] = 1;
		if ($tablero[$f][$c] === "*"){
	        return "Bomba";
	    }else {
		    if (checkVictoria($tableroVisible, $filas, $columnas, $bombas)){
		        /*Detapadas todas las casillar; break recursividad*/
		    	return 1;
		    }else {
		        /*Si no hay minas cercanas */
		        if ($tablero[$f][$c]==0){
                // $tableroVisible[$f][$c] = $tablero[$f][$c];
			    /*Recorre las casillas cercanas y tambien las ejecuta*/
                    for ($i=max(0, $f-1); $i <= min($f-1,$f+1);$i++){
                        for ($j=max(0,$c-1);$j <= min($c-1,$c+1);$j++){
                            clickCasilla($tablero, $tableroVisible, $f, $c, $filas, $columnas, $bombas);
                        }
                    }
			    }
		    }
	    }
    }
}
?>