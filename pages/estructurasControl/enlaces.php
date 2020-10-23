<?php
/**
 * Lista de enlaces en función del perfil de usuario.
 * @author Cristina Prieto Jalao
 * 27/09/2020
 */
$perfil = "Invitado";
if($perfil == "admin"){
    echo "<a href=\"#\" > Inicio </a>";
    echo "<a href=\"#\" > Administrar </a>";
} else if($perfil == "Invitado"){
    echo "<p><a href=\"#\" > Inicio </a></p>";
    echo "<a href=\"#\" > Mis trámites </a>";
} else {
    echo "<a href=\"#\" > Inicio </a>"; 
}
?>