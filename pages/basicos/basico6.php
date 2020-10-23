<?php
/**
 * - A veces es necesario conocer exactamente el contenido de una variable. Piensa como puedes hacer esto y escribe un script con la siguiente salida:
 * string(5) “Harry”
 * Harry
 * int(28)
 * NULL
 * @author Cristina Prieto Jalao
 * 25/09/2020
 */
$variable1 = "Harry";
$variable2 = "Harry";
$variable3 = 28;
$variable4 ;
echo "<section>";
echo "<p>Datos de las siguientes variables: </p>";
echo "<p>".var_dump($variable1)."</p>";
echo "<p>".var_dump($variable2)."</p>";
echo "<p>".var_dump($variable3)."</p>";
echo "<p>".var_dump($variable4)."</p>";
echo "</section>";
?>