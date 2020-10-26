<?php
/**
 * Escribe un script que permita factorizar un número pasado por la URL.  Muestra el resultado en dos columnas.
 * @author Cristina Prieto Jalao
 * 26/10/2020
 */
echo "<p>Introduce por la URL un número para poder factorizarlo, hazlo de la siguiente manera:</p>";
echo "<p>http://localhost/pages/funciones/index.php?page=calculaletra&numero=26.</p>";

function factoriza($numero){
    $factores = array();
    $f = 1;
    if($numero%$f){
        $numero/$f;
        array_push($f, $factores);
    }else{
        $f++;
    }
    factoriza($numero);
}
$numero = $_GET["numero"];
$resultado = "la factorizacion de $numero es :".factoriza($numero); 
