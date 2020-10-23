<?php
/**
 * Calendario
 * @author Cristina Prieto Jalao
 * 29/09/2020
 */
$diaActual = date("j");
$mesActual = date("n");
$mes = 10;
$annyo = 2020;
$diasDelMes = cal_days_in_month(CAL_GREGORIAN, $mes, $annyo);
$DIAS_SEMANA = 7;
$primerDia=date("N", mktime(0,0,0,$mes,1,$annyo));     
$huecosBlancos = $DIAS_SEMANA - $primerDia;
$dias = array("L", "M", "X", "J", "V", "S", "D");

$diasFestivos = array(
    1 => array(1, 6),
    2 => array(),
    3 => array(9, 10, 13),
    4 => array(1),
    5 => array(1),
    6 => array(),
    7 => array(25),
    8 => array(15),
    9 => array(),
    10 => array(12),
    11 => array(2),
    12 => array(7,8,25)
);
echo "Calendario del mes ".$mes." del año ".$annyo;
echo "<table border=\"1px solid black\">";
echo "<tr>";
for($i=0; $i<$DIAS_SEMANA; $i++){
    echo "<th>$dias[$i]</th>";
}
echo "</tr>";
for($i=0; $i<$huecosBlancos; $i++){
    echo "<td></td>";
}
for($i=1; $i<$diasDelMes; $i++){
    if(($i+$huecosBlancos)%7==0){
        echo "<td style=\"background-color: red\">$i</td>";
        echo "<tr>";
    }elseif(in_array($i, $diasFestivos[$mes])){
        echo "<td style=\"background-color: red\">$i</td>";
    }elseif($i == $diaActual && $mes == $mesActual){
        echo "<td style=\"background-color: green\">$i</td>";
    }else{
        echo "<td>$i</td>";
    }
}
echo "</table>";
