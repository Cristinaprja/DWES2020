<?php
/**
 * Script que cargue las siguientes variables: $x=10; $y=7; 
 * y muestre 10 + 7 = 17, 10 - 7 = 3, 10 * 7 = 70, 10 / 7 = 1.4285714285714, 10 % 7 = 3
 * @author Cristina Prieto Jalao
 * 25/09/2020
 */
$x=10;
$y=7;
echo "<section>";
echo "<p>".$x." + ".$y." = ".($x+$y)."</p>";
echo "<p>".$x." - ".$y." = ".($x-$y)."</p>";
echo "<p>".$x." * ".$y." = ".($x*$y)."</p>";
echo "<p>".$x." / ".$y." = ".($x/$y)."</p>";
echo "<p>".$x." % ".$y." = ".($x%$y)."</p>";
echo "</section>";
?>