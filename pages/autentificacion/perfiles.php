<?php
/**
 * Desarrolla un sistema de registro y autentificación que incluya distintos perfiles de usuarios. Crea un
 * menú de opciones y páginas correspondientes en función del perfil.
 * @author Cristina Prieto Jalao
 * 16/11/2020
 */
session_start();
if(!isset($_SESSION["sesion"])){
    $_SESSION["usuario"] = "Invitado";
}
function limpiarDatos($limpiar){
    $error = trim($limpiar);
    $error = stripslashes($limpiar);
    $error =  htmlspecialchars($limpiar);
    return $error;
}
if(isset($_POST["enviar"])){
    if(limpiarDatos($_POST["user"]) == "admin" && limpiarDatos($_POST["password"]) == "admin"){
        $_SESSION["usuario"] = "admin";
    }else if(limpiarDatos($_POST["user"]) == "alumna" && limpiarDatos($_POST["password"] == "alumna")){
        $_SESSION["usuario"] = "alumna";
    }else{
        echo "<span style=\"color:red\">Usuario y/o contraseña incorrectos</span>";
    }
}

if($_SESSION["usuario"] == "Invitado"){
    echo "<header>Usted está como ".$_SESSION["usuario"]."</header>";
    echo "<form action=\"index.php?page=perfiles\" method=\"post\">";
        echo "<p><label>Usuario: <input type=\"text\" name=\"user\" required/></label></p>";
        echo "<p><label>Contraseña: <input type=\"password\" name=\"password\" required/></label></p>";
        echo "<p><input type=\"submit\" name=\"enviar\" value=\"Enviar\"></p>";
    echo "</form>";
}else if($_SESSION["usuario"] == "admin"){
    echo "<header>Bienvenido ".$_SESSION["usuario"]."</header>";
    echo "<p><a target=\"_blank\" href=\"admin.php\">Administración</a></p>";
    echo "<p><a href=\"cerrarSesion2.php\">Cerrar Sesion</a></p>";

}else if($_SESSION["usuario"] == "alumna"){
    echo "<header>Bienvenido ".$_SESSION["usuario"]."</header>";    
    echo "<p><a target=\"_blank\" href=\"tareas.php\">Tareas</a></p>";
    echo "<p><a href=\"cerrarSesion2.php\">Cerrar Sesion</a></p>";
}
?>