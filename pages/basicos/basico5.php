<?php
/**
 * Escribir un script que declare una variable y muestre la siguiente información en pantalla:
 * Valor actual 8.
 * Suma 2. Valor ahora 10.
 * Resta 4. Valor ahora 6.
 * Multipica por 5. Valor ahora 30.
 * Divide por 3. Valor ahora 10.
 * Incrementa el valor en 1. Valor ahora 11.
 * Decrementa el valor en 1. Valor ahora 11.
 * @author Cristina Prieto Jalao
 * 25/09/2020
 */
$variable = 8;
echo "<section>";
echo "<p>Valor actual: ".$variable."</p>";
echo "<p>Suma 2. Valor ahora: ".($variable = $variable+2)."</p>";
echo "<p>Resta 4. Valor ahora: ".($variable = $variable-4)."</p>";
echo "<p>Multipica por 5. Valor ahora: ".($variable = $variable*5)."</p>";
echo "<p>Divide por 3. Valor ahora: ".($variable = $variable/3)."</p>";
echo "<p>Incrementa el valor en 1. Valor ahora: ".($variable = $variable+1)."</p>";
echo "<p>Decrementa el valor en 1. Valor ahora: ".($variable = $variable-1)."</p>";
echo "</section>";
?>