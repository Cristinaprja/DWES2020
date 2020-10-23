<?php
/**
 * Script para calcular el área de un círculo cargando el valor del radio en una variable.
 * @author Cristina Prieto Jalao
 * 25/09/2020
 */
$radio = 2;
$numPi = 3.14159;
$area = $numPi * $radio**2;
echo "<section>";
echo "<p>El área de un círculo cuyo radio es ".$radio." es de ".$area."</p>";
echo "</section>";
?>