<?php
/**
 * Crea un formulario de login que permita al usuario recordar los datos introducidos. Incluye una opción para borrar la información almacenada
 * @author Cristina Prieto Jalao
 * 03/11/2020
 */

$usuario = "";
$password = "";
if(isset($_COOKIE["usuario"])){
    $usuario = $_COOKIE["usuario"];
    $password = $_COOKIE["password"];
}
echo "<form action=\"index.php?page=formulario\" method=\"post\">";
echo "<p><label>Usuario: <input type=\"text\" name=\"usuario\" value=\"".$usuario."\"required/></label></p>";
echo "<p><label>Contraseña: <input type=\"password\" name=\"password\" value=\"".$password."\"required/></label></p>";
echo "<p><label>Recordar credenciales: <input type=\"checkbox\" name=\"recordar\" /></label></p>";
echo "<p><input type=\"submit\" name=\"enviar\"/></label></p>";

if(isset($_POST["enviar"])){
    echo "Has iniciado sesion";
    if(isset($_POST["recordar"]) == 'on'){
        setcookie("usuario", $_POST["usuario"], time()+3600);
        setcookie("password", $_POST["password"], time()+3600);
    }else{
        setcookie("usuario", "", time()-3600);
        setcookie("password", "", time()-3600);
    }
}
if(isset($_COOKIE["usuario"])){
    $usuario = $_COOKIE["usuario"];
    $password = $_COOKIE["password"];
}
?>