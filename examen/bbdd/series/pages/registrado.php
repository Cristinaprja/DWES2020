<?php
if(!(isset($_SESSION["perfil"])) || $_SESSION["perfil"] == "admin"){
    header("Location: index.php");
} 
if($_SESSION["perfil"] == "basico"){
    echo "Usuario básico";
}else if($_SESSION["perfil"] == "premium"){
    echo "Usuario premium";
}
echo "Películas";
