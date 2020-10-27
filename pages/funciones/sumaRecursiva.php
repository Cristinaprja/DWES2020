<?php
/**
 * Función recursiva que permita sumar los dígitos de un número pasado por la URL.
 * @author Cristina Prieto Jalao
 * 26/10/2020
 */

echo "<p>Introduce por la URL un número para podersumarlo, hazlo de la siguiente manera:</p>";
echo "<p>http://localhost/pages/funciones/index.php?page=calculaletra&numero=26.</p>";

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
if(isset($_GET["numero"])){
    $numeros = $_GET["numero"];
    echo "La suma de los dígitos del número $numeros es:".sumaRecursiva($numeros);
}
?>