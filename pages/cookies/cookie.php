<?php
/**
 * Escriba una página que permita crear una cookie de duración limitada, comprobar el esado de la cookie y destruirla
 * @author Cristina Prieto Jalao
 * 03/11/2020
 */

$nombreCookie = "cookie1";

echo "<form action=\"index.php?page=cookie\" method=\"post\">";
echo "<button name=\"crearCookie\">Crear cookie</button></p>";
echo "<button name=\"estadoCookie\">Estado cookie</button></p>";
echo "<button name=\"borrarCookie\">Borrar cookie</button></p>";
echo "</form>";

if (isset($_POST["crearCookie"])) {
    setcookie($nombreCookie, "Hola, soy una cookie", time()+3600); //Expira en una hora
    print_r($_COOKIE[$nombreCookie]);
}else if (isset($_POST["estadoCookie"])){
    if (!isset($_COOKIE[$nombreCookie])){
        echo "No existe la cookie $nombreCookie";
    }else{
        echo "Existe la cookie $nombreCookie";
    }
}else if (isset($_POST["borrarCookie"])) {
	setcookie($nombreCookie, "", time()-3600);
	echo 'Cookie borrada<br>';
}
?>