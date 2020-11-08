<?php
/**
 * Escriba una página que compruebe si el navegador permite crear cookies y se lo diga al usuario (mediante una o más páginas)
 * @author Cristina Prieto Jalao
 * 03/11/2020
 */
$nombreCookie = "cookie2";

echo "<form action=\"index.php?page=navegador\" method=\"post\">";
echo "<button name=\"crearCookie\">Crear cookie</button></p>";
echo "<button name=\"borrarCookie\">Borrar cookie</button></p>";
echo "</form>";

if (isset($_POST["crearCookie"])) {
    setcookie($nombreCookie, "Hola, soy una cookie", time()+3600); //Expira en una hora
    echo "Cookie creada";
}else if (isset($_POST["borrarCookie"])) {
	setcookie($nombreCookie, "", time()-3600);
	echo "Cookie borrada";
}
?>