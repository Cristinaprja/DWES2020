<?php
/**
 * Suma de los tres primeros números pares
 * @author Cristina Prieto Jalao
 * 29/09/2020
 */
$i=1;
$sumatorio=0;
$contador = 0;
while($contador < 3){
    if($i % 2 == 0){
        $sumatorio+=$i;
        echo "Numero par: ".$i."<br>";
        $contador++;
    }
    $i++;
}
echo "El sumatorio es : ".$sumatorio;
?>