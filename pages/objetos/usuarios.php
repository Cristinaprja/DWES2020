<?php
/**
 * Diseña e implementa un sistema de autentificación de usuarios utilizando objetos.
 * @author Cristina Prieto Jalao
 * 24/11/2020
 */
include "class/Usuario.php";
session_start();
if(!isset($_SESSION["usuarios"]) && !isset($_SESSION["auth"])){
    $_SESSION["arrayUsuarios"] = array();
    $_SESSION["auth"] = false;
}
if($_SESSION["auth"]){
    header("Location: home.php");
}

function normaliza($cadena){
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

if(isset($_POST["registro"])){
    echo "<h3>Registro</h3>";
    echo "<form action=\"index.php?page=usuarios\" method=\"post\">";
    echo "<p><label>Usuario: <input type=\"text\" name=\"usuario\" required /></label></p>";
    echo "<p><label>Contraseña: <input type=\"text\" name=\"contraseña\" required /></label></p>";
    echo "<p><input type=\"submit\" name=\"registrarse\" value=\"Registrarse\"></p>";
    echo "</form>";
}else if(isset($_POST["iniciarSesion"])){
    if(!empty($_POST["usuario"]) && !empty($_POST["contraseña"])){
        foreach($_SESSION["arrayUsuarios"] as $usuario){
            if($usuario->getUser() == normaliza($_POST["usuario"]) && $usuario->getPassword()  == normaliza($_POST["contraseña"])){
                header("Location: home.php");
            }
        }
    }else{
        header("Location: index.php?page=usuarios");
    }
}else{
    echo "<h3>Iniciar Sesion</h3>";
    echo "<form action=\"index.php?page=usuarios\" method=\"post\">";
    echo "<p><label>Usuario: <input type=\"text\" name=\"usuario\"/></label></p>";
    echo "<p><label>Contraseña: <input type=\"text\" name=\"contraseña\" /></label></p>";
    echo "<p><input type=\"submit\" name=\"iniciarSesion\" value=\"Iniciar Sesion\"></p>";
    echo "<p><input type=\"submit\" name=\"registro\" value=\"Registro\"></p>";
    echo "</form>";
}

if(isset($_POST["registrarse"])){
    if (!empty($_SESSION['usuarios'])) {
        foreach ($_SESSION['usuarios'] as $user) {
            if ($user->getUser() == $_POST["usuario"]) {
                echo "<p>El usuario ya existe</p>";
                $error = true;
            }
        }
    }
    if(!$error){
        $usuario = new Usuario(normaliza($_POST["usuario"]), normaliza($_POST["contraseña"]));
        array_push($_SESSION["arrayUsuarios"], $usuario);
        echo "Tu registro se ha efectuado correctamente";
    }
}
?>