<?php
/**
 * Ejercicios básicos
 * @author Cristina Prieto Jalao
 * 24/09/2020
 */

//Ficha personal
$nombre = "Cristina";
$apellidos = "Prieto Jalao";
$edad = 19;
$imagen = "../../../images/yo.jpg";

echo "<section>";
echo "<p>Hola, mi nombre es ".$nombre." ".$apellidos." y tengo ".$edad." años.</p>";
echo "<p>Foto personal : <img src=\"".$imagen."\" width=\"90px\"></img></p>";
echo "</section>";
?>
