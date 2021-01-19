<?php
/**
 * Usando la clase superheroe   
 */
include "class/Superheroe.php";
include "config/config.php";

$sh = Superheroe::getInstancia();
$superheroes = $sh->getAll();

echo "<form action=\"index.php\" method=\"post\">";
    echo "<p><input type=\"text\" name=\"busqueda\">";
    echo "<input type=\"submit\" name=\"btnBuscar\" value=\"Buscar\">";
    echo "<a href=\"index.php?btnAdd\">Agregar</a></p>";
    echo "<table border=\"1px solid black\">";
    echo "<th>Nombre</th><th>Velocidad</th>";
        foreach($superheroes as $valor){
            echo "<tr>";
            echo "<td>".$valor["nombre"]."</td>";
            echo "<td>".$valor["velocidad"]."</td>";
            echo "<td><a href=\"index.php?btnDel=".$valor["id"]."\">Del</a></td>";
            echo "<td><a href=\"index.php?btnEdit=".$valor["id"]."&nombre=".$valor["nombre"]."&velocidad=".$valor["velocidad"]."\">Edit</a></td>";
            echo "</td></tr>";
        }
    echo "</table>";
echo "</form>";

if(isset($_POST["btnBuscar"])){
    $resultado = $sh->buscarPorNombre($_POST["busqueda"]);

    echo count($resultado). " resultados encontrados<br>";
    foreach($resultado as $key => $value){
        echo "Nombre: ".$value["nombre"]."<br>";
    }
}
if(isset($_GET["btnDel"])){
    $id = $_GET["btnDel"];
    $resultado = $sh->delete($id);
    echo "Has eliminado un superheroe";
}
if(isset($_GET["btnEdit"])){
    $id = $_GET["btnEdit"];
    $nombre = $_GET["nombre"];
    $velocidad = $_GET["velocidad"];
    echo "<form action=\"index.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
        echo "<p><label>Nombre: <input type=\"text\" name=\"nombre\" value=\"$nombre\"></label></p>";
        echo "<p><label>Velocidad: <input type=\"text\" name=\"velocidad\" value=\"$velocidad\"></label></p>";
        echo "<input type=\"hidden\" name=\"id\" value=\"$id\" />";
        echo "<input type=\"submit\" name=\"editar\" value=\"Editar\">";
    echo "</form>";
}
if(isset($_POST["editar"])){
    $datosEditar = array("nombre" => $_POST["nombre"], 
                        "velocidad" => $_POST["velocidad"],
                        "id" => $_POST["id"]);
    $sh->edit($datosEditar);
    echo "Has modificado un superheroe";
}
?>