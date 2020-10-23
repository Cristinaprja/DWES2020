<?php
/**
 *  Cargar fecha de nacimiento en una variable y calcular la edad
 * @author Cristina Prieto Jalao
 * 27/09/2020
 */
$fechaNac = "2001-04-29";
list($anyoNac,$mesNac,$diaNac) = explode("-",$fechaNac);

$diaHoy = date("j");
$mesHoy = date("n");
$anyoHoy = date("Y");

if (($mesNac == $mesHoy) && ($diaNac > $diaHoy)) { 
    $anyoHoy--;
}
if ($mesNac > $mesHoy) {
    $anyoHoy--;
}
echo "La persona nacida en la fecha ".$fechaNac." tiene una edad de ".($anyoHoy-$anyoNac)." años";