<?php
/**
 * Ejercicio 2 examen de Diciembre
 * @author Cristina Prieto Jalao
 * 11/12/2020
 */
include "funciones.php";
session_start();
if(!isset($_SESSION["sesion"])){
    $_SESSION["perfil"] = "Invitado";
    $_SESSION["multas"] = array();
    $_SESSION["idMulta"] = 1;
}
$_SESSION["sesion"] = true;
$usuarios = array(
    array("usuario" => "admin", "psw" => "admin", "nombre" => "Administrador", "Perfil" => "administrador"),
    array("usuario" => "agente1", "psw" => "agente1", "nombre" => "Agente1", "Perfil" => "agente"),
    array("usuario" => "agente2", "psw" => "agente2", "nombre" => "Agente2", "Perfil" => "agente"),
);
if(isset($_POST["enviar"])){
    foreach($usuarios as $array => $perfil){
        $usuarioCorrecto = false;
        $passwordCorrecto = false;
        foreach($perfil as $key => $value){
            switch($key){
                case "usuario":
                    if(limpiarDatos($_POST["user"]) == $value){
                        $usuarioCorrecto = true;
                    }
                break;
                case "psw":
                    if(limpiarDatos($_POST["password"]) == $value){
                        $passwordCorrecto = true;
                    }
                break;
                case "Perfil":
                    if($usuarioCorrecto && $passwordCorrecto){
                        $_SESSION["perfil"] = $value;
                    }
                break;
            }
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multas</title>
</head>
<body>
    <?php
        if($_SESSION["perfil"] == "Invitado"){
            echo "<header>Usted está como ".$_SESSION["perfil"]."</header>";
            echo "<form action=\"index.php\" method=\"post\">";
                echo "<p><label>Usuario: <input type=\"text\" name=\"user\" required/></label></p>";
                echo "<p><label>Contraseña: <input type=\"password\" name=\"password\" required/></label></p>";
                echo "<p><input type=\"submit\" name=\"enviar\" value=\"Enviar\"></p>";
            echo "</form>";
            if(!empty($_SESSION["multas"])){
                multasAPagar($_SESSION["multas"]);
            }else{
                echo "<h2>No existe ninguna multa</h2>";
            }
        }else if($_SESSION["perfil"] == "agente"){
            echo "<header>Bienvenido ".$_SESSION["perfil"]." <a href=\"salir.php\">Salir</a></header>";
            echo "<p><a target=\"_blank\" href=\"agente.php\">Agente</a></p>";
        
        }else if($_SESSION["perfil"] == "administrador"){
            echo "<header>Bienvenido ".$_SESSION["perfil"]." <a href=\"salir.php\">Salir</a></header>";    
            echo "<p><a target=\"_blank\" href=\"admin.php\">Administrador</a></p>";
        }
        if(isset($_POST["pagar"])){
            $fecha = explode("-", $_POST["fechaMulta"]);
            if($fecha[1] == date("d")+1){
                echo "<p>Has recibido un descuento del 50% por pagar la fecha en el mismo mes</p>";
            }
            $_SESSION["multas"] = pagarMulta($_SESSION["multas"], $_POST["idMulta"]);
            echo "Multa pagada";
        }
    ?>
</body>
</html>