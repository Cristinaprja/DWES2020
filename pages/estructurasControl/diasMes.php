<?php
/**
 * Cargar en variables mes y año e indicar el número de días del mes.
 * @author Cristina Prieto Jalao
 * 27/09/2020
 */
$mes = 4;
$anyo = 2020;
echo "El mes número ".$mes." del año ".$anyo." tiene ".cal_days_in_month(CAL_GREGORIAN, $mes, $anyo)." días";
?>