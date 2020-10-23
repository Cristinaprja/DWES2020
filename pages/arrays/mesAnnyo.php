<?php
/**
 * Meses del año almacenados en un array
 * @author Cristina Prieto Jalao
 * 06/10/2020
 */
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
echo "<p>Los meses del año son: ";
for($i=0; $i<count($meses); $i++){
    echo "<strong> ".$meses[$i]. "</strong>, ";
}