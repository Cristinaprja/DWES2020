<?php
/**
 * Escribir un script que utilizando variables permita obtener el siguiente resultado:
 * Valor es string.
 * Valor es double.
 * Valor es boolean.
 * Valor ess integer.
 * Valos is NULL.
 * @author Cristina Prieto Jalao
 * 25/09/2020
 */
$variables = array("Hola", 2.5, true, 2, NULL);
echo "<section>";
echo "<p>Tipos de variables: </p>";
foreach ($variables as $value) {
    echo "<p>".gettype($value)."</p>";
}
echo "</section>";
?>