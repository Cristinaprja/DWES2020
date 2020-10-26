<?php
/**
 * Función recursiva que permita sumar los dígitos de un número pasado por la URL.
 * @author Cristina Prieto Jalao
 * 26/10/2020
 */

$sumaDigitos = 0;
function sumaRecursiva($numeros){
    if(strlen($numeros)<2){
        return $numeros;
    }else{
        $ultimoDigito = $numeros%10;
        $numeros = $numeros/10;
        return $ultimoDigito + sumaRecursiva($numeros);
    }
}
$numeros = $_GET["numero"];
echo "La suma de los dígitos del número $numeros es:".sumaRecursiva($numeros);
?>