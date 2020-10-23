<?php
/**
 * Calendario con formulario
 * @author Cristina Prieto Jalao
 * 03/10/2020
 */
$diaActual = date("j");
$mesActual = date("n");
$DIAS_SEMANA = 7;
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
echo "<form action=\"index.php?page=calendario2\" method=\"post\">";
echo "<p> Mes : <select name=\"mesElegido\" required>";
for($i=1; $i<13; $i++){
    echo "<option value=\"$i\">$i</option>";
}
echo "</p></select>";
echo "<p> Año :<input name=\"annyoElegido\" type=\"number\" min=\"1900\" max=\"2100\" required></p>";
echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
echo "</form>";
if(isset($_POST["enviar"])){
    $mes = $_POST["mesElegido"];
    $annyo = $_POST["annyoElegido"];    
}else{
    $mes = 10;
    $annyo = 2020;
}
//Calculamos semana santa y añadimos jueves y viernes santo como festivos
$domingoPascua = date("j", easter_date($annyo));
$mesDePascua = date("m", easter_date($annyo));
$juevesDePascua = $domingoPascua - 3;
array_push($diasFestivos[$mesDePascua-1],$juevesDePascua);
array_push($diasFestivos[$mesDePascua-1],($juevesDePascua+1)); 

$diasDelMes = cal_days_in_month(CAL_GREGORIAN, $mes, $annyo);
$primerDia=date("N", mktime(0,0,0,$mes,1,$annyo)); 
$huecosBlancos = $DIAS_SEMANA - $primerDia;

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
