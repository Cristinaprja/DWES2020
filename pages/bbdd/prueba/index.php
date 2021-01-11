<?php
/**
 * Conexión básica
 * @author Cristina Prieto Jalao
 * 08/01/2021
 */
include "include/funciones.php";

$db = conectaDB();

$sqlConsulta = "SELECT * FROM superheroes";

$consulta = $db->query($sqlConsulta);
$consulta->execute();
$resultado = $consulta->fetchAll();
echo "<form action=\"index.php\" method=\"post\">";
echo "<input type=\"text\" name=\"nuevoSuper\"><a href=\"index.php?btnAdd\">Agregar</a>";
    echo "<table border=\"1px solid black\">";
        foreach($resultado as $valor){
            echo "<tr>";
            echo "<td>".$valor["nombre"]."</td><br>";
            echo "<td><a href=\"index.php?btnDel=".$valor["id"]."\">Del</a></td>";
            echo "<td><a href=\"index.php?btnEdit=".$valor["id"]."&nombre=".$valor["nombre"]."&velocidad=".$valor["velocidad"]."&created=".$valor["created_at"]."&updated=".$valor["updated_at"]."\">Edit</a></td>";
            echo "</td></tr>";
        }
    echo "</table>";
echo "</form>";

if(isset($_GET["btnDel"])){
    $id = $_GET["btnDel"];
    $sqlDelete = "DELETE FROM superheroes where id=\"$id\"";
    $resultado = $db->query($sqlDelete);
    echo "Has eliminado un superheroe";
}
if(isset($_GET["btnEdit"])){
    $id = $_GET["btnEdit"];
    $nombre = $_GET["nombre"];
    $velocidad = $_GET["velocidad"];
    $created = $_GET["created"];
    $updated = $_GET["updated"];
    echo "<form action=\"index.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
        echo "<p><label>Nombre: <input type=\"text\" name=\"nombre\" value=\"$nombre\"></label></p>";
        echo "<p><label>Velocidad: <input type=\"text\" name=\"velocidad\" value=\"$velocidad\"></label></p>";
        echo "<p><label>Created at: <input type=\"text\" name=\"created\" value=\"$created\"></label></p>";
        echo "<p><label>Updated at: <input type=\"text\" name=\"updated\" value=\"$updated\"></label></p>";
        echo "<input type=\"submit\" name=\"editar\" value=\"Editar\">";
    echo "</form>";
}
if(isset($_POST["editar"])){
    $sqlEdit = "UPDATE superheroes SET nombre=\"".$_POST["nombre"]."\" ,velocidad=\"".$_POST["velocidad"].
    "\" ,created_at=\"".$_POST["created"]."\" ,updated_at=\"".$_POST["updated"]."\" WHERE id=\"".$_POST["id"]."\"";
    $resultado = $db->query($sqlEdit);
    echo "Has modificado un superheroe";
}
if(isset($_GET["btnAdd"])){
    if(!empty($_POST["nuevoSuper"])){
        $sqlAdd = "INSERT INTO superheroes(nombre) VALUES (\"".$_POST["nuevoSuper"]."\")";
        $resultado = $db->query($sqlAdd);
        echo "Has agregado un superheroe";
    }else{
        echo "esta vacio";
    }
}