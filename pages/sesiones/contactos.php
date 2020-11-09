<?php
/**
 * Crear una aplicación para gestionar una agenda de contactos. 
 * @author Cristina Prieto Jalao
 * 05/11/2020
 */
session_start();
if(!isset($_SESSION["sesionIniciada"])){
    $_SESSION["arrayContactos"] = array();
        // array(
        //     "nombre" => "Elba Calao",
        //     "telefono" =>"111111111"),
        // array(
        //     "nombre" => "Susana Oria",
        //     "telefono" =>"222222222"),
        // array(
        //     "nombre" => "Elsa Capunta",
        //     "telefono" =>"333333333"),
        // array(
        //     "nombre" => "Esteban Quito",
        //     "telefono" =>"444444444"),
        // array(
        //     "nombre" => "Mario Neta",
        //     "telefono" => "555555555"),
        // array(
        //     "nombre" => "Lola Mento",
        //     "telefono" => "666666666"),
        // array(
        //     "nombre" => "Aitor Tilla",
        //     "telefono" => "777777777"),
        // array(
        //     "nombre" => "Elton Tillo",
        //     "telefono" => "888888888"),
        // array(
        //     "nombre" => "Elvis Nieto",
        //     "telefono" => "999999999"), 
    // );
}
$_SESSION["sesionIniciada"] = true;

echo "<a href=\"cerrarSesion.php\">Cerrar Sesion</a>";
echo "<form action=\"index.php?page=contactos\" method=\"post\">";
echo "<label>Buscar por nombre :<input type=\"text\" name=\"busqueda\"></label><button name=\"buscar\">Buscar</button>";
echo "<p><button name=\"nuevoContacto\">Agregar Contacto</button></p>";
echo "</form>";

function mostrarContactos($array){
    echo "<table border=\"1px solid black\">";
    echo "<th>Nombre</th><th>Teléfono</th><th>Eliminar</th>";
    foreach($array as $contactos => $contacto){
        echo "<tr>";
            foreach($contacto as $key => $value){
                if($key == "nombre"){
                    echo "<td>$value</td>";
                }elseif($key == "telefono"){
                    echo "<td>$value</td>";
                }
            }
            echo "<td>";
                echo "<form action=\"index.php?page=contactos\" method=\"post\"/>";
                    echo "<input type=\"hidden\" name=\"posicion\" value=\"$contactos\"/>";
                    echo "<input type=\"submit\" name=\"eliminarContacto\" value=\"X\"/>";
                echo "</form>";
            echo "</td>";
        echo "</tr>";
        }
    echo "</table>";
}
if(isset($_POST["eliminarContacto"])){
    unset($_SESSION["arrayContactos"][$_POST["posicion"]]);
    echo "Contacto eliminado";
}
if(isset($_POST["buscar"])){
    $resultadoBusqueda = array();
    $cadenaBusqueda = $_POST["busqueda"];
    if(empty($cadenaBusqueda) || sizeof($_SESSION["arrayContactos"]) == 0)
        echo "<p style=\"color:red\">Agenda Vacía</p>";
    else{
        foreach ($_SESSION["arrayContactos"] as $contactos => $contacto) {
            foreach ($contacto as $clave => $valor) {
                if($clave == "nombre" && is_numeric(strpos($valor,$cadenaBusqueda))){
                    array_push($resultadoBusqueda, $contacto);
                }
            }
        }
        if(sizeof($resultadoBusqueda) > 0){
            echo "<p>".sizeof($resultadoBusqueda)." resultados</p>";
            echo "<table border=\"1px solid black\">";
            echo "<th>Nombre</th><th>Numero</th>";
            foreach($resultadoBusqueda as $contacto => $valor){
                echo "<tr>";
                foreach($valor as $key => $value){
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><br>";
        }else{
            echo "<p>No se encontró ningún contacto</p>";
        }
    } 
}
if(isset($_POST["nuevoContacto"])){
    echo "<form action=\"index.php?page=contactos\" method=\"post\">";
    echo "<p><label>Nombre :<input type=\"text\" name=\"nombre\" required /></label></p>";
    echo "<p><label>Telefono :<input type=\"text\" name=\"telefono\" required /></label></p>";
    echo "<p><button name=\"annadir\">Añadir Contacto</button></p>";
    echo "</form>";

}
if(isset($_POST["annadir"])){
    $array = array("nombre" => $_POST["nombre"], "telefono" => $_POST["telefono"]);
    array_push($_SESSION["arrayContactos"], $array);
    echo "Nuevo contacto añadido";
}
if(sizeof($_SESSION["arrayContactos"]) > 0){
    mostrarContactos($_SESSION["arrayContactos"]);
}
?>