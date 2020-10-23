<?php
/**
 *  Cabecera en función de la estación del año
 * @author Cristina Prieto Jalao
 * 27/09/2020
 */
$mesActual  = date('n');
$diaActual = date("j");
if($mesActual == 3 && $diaActual > 19 || $mesActual == 4 || $mesActual == 5 || $mesActual == 6 && $diaActual < 21){
    $img = "imgEstaciones/primavera.jpg";
    echo "PRIMAVERA:";
} else if($mesActual == 6 && $diaActual > 19 ||$mesActual == 7 || $mesActual == 8 || $mesActual == 9 && $diaActual < 23){
    $img = "imgEstaciones/verano.jpg";
    echo "VERANO";
} else if($mesActual == 9 && $diaActual > 21 || $mesActual == 10 ||$mesActual == 11 || $mesActual==12 && $diaActual < 22){
    $img = "imgEstaciones/otono.jpg";
    echo "OTOÑO";
}else{
    $img = "imgEstaciones/invierno.jpg";
    echo "INVIERNO";
}
echo "<img src=\"$img\" width=\"100px\">";
?>