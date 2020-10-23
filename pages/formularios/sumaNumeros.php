<?php
/**
 * Crear un script para sumar una serie de números. El número de números a sumar será introducido 
 * en un formulario.
 * @author Cristina Prieto Jalao
 * 20/10/2020
 */

$sumatorio = 0;

if(isset($_POST["enviar"])){
    echo "<p>Cantidad de números ".$_POST["cantidad"];
    echo "<form action=\"index.php?page=sumaNumeros\" method=\"post\">";
    for($i=0; $i<$_POST["cantidad"]; $i++){
        echo "<label>Número $i: <input type=\"number\" name=\"numeros[]\" required/></label>";
    }
    echo "<input type=\"submit\" name=\"sumar\" value=\"Sumar\">";
}else{
    echo "<form action=\"index.php?page=sumaNumeros\" method=\"post\">";
    echo "<label>Cantidad de números<input type=\"number\" name=\"cantidad\" min=\"2\" max\"6\" required/></label>";
    echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
    echo "</form>";
}
if(isset($_POST["sumar"])){
    foreach($_POST["numeros"] as $numero){
        $sumatorio+=$numero;
    }
    echo "El sumatorio de los números introducidos es: ".$sumatorio;
}
?>