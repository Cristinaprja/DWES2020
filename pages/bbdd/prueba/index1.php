<?php
/**
 * Conexión básica
 * @author Cristina Prieto Jalao
 * 08/01/2021
 */
include "include/funciones.php";

$db = conectaDB();
$velocidad = 0;
$sqlConsulta = "SELECT * FROM superheroes WHERE velocidad > :velocidad  ";
$consulta = $db->prepare($sqlConsulta);
$aParametros = array(":velocidad"=> $velocidad);
$consulta->execute($aParametros);
$resultado = $consulta->fetchAll();

echo "<form action=\"index.php\" method=\"post\">";
    echo "<p><input type=\"text\" name=\"busqueda\">";
    echo "<input type=\"submit\" name=\"btnBuscar\" value=\"Buscar\">";
    echo "<a href=\"index.php?btnAdd\">Agregar</a></p>";
    echo "<table border=\"1px solid black\">";
        foreach($resultado as $valor){
            echo "<tr>";
            echo "<td>".$valor["nombre"]."</td>";
            echo "<td><a href=\"index.php?btnDel=".$valor["id"]."\">Del</a></td>";
            echo "<td><a href=\"index.php?btnEdit=".$valor["id"]."&nombre=".$valor["nombre"]."&velocidad=".$valor["velocidad"]."&created=".
                $valor["created_at"]."&updated=".$valor["updated_at"]."\">Edit</a></td>";
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
        echo "<input type=\"hidden\" name=\"id\" value=\"$id\" />";
        echo "<input type=\"submit\" name=\"editar\" value=\"Editar\">";
    echo "</form>";
}
if(isset($_POST["editar"])){
    $sqlEdit = "UPDATE superheroes SET nombre=:nombre, velocidad=:velocidad, created_at=:created_up, updated_at=:updated_at WHERE id=:id";

    $consulta = $db->prepare($sqlEdit);
    $editParametros = array(":nombre"=> $_POST["nombre"],
                        ":velocidad" => $_POST["velocidad"],
                        ":created_up" => $_POST["created"],
                        ":updated_up" => $_POST["updated"],
                        ":id" => $_POST["id"]);
    $consulta->execute($editParametros);
    $resultado = $consulta->fetchAll();
    echo "Has modificado un superheroe";
}
if(isset($_GET["btnAdd"])){
    echo "<form action=\"index.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"id\">";
        echo "<p><label>Nombre: <input type=\"text\" name=\"nombreS\" required></label></p>";
        echo "<p><label>Velocidad: <input type=\"text\" name=\"velocidadS\" required></label></p>";
        // echo "<p><label>Created at: <input type=\"text\" name=\"createdS\"></label></p>";
        // echo "<p><label>Updated at: <input type=\"text\" name=\"updatedS\"></label></p>";
        echo "<input type=\"submit\" name=\"agregar\" value=\"Agregar\">";
    echo "</form>";
}
if(isset($_POST["agregar"])){
    $sqlAdd = "INSERT INTO superheroes(nombre, velocidad) VALUES (\"".$_POST["nombreS"]."\", \"".$_POST["velocidadS"]."\")";
    $resultado = $db->query($sqlAdd);
    echo "Has agregado un superheroe";
}
if(isset($_POST["btnBuscar"])){
    $sqlBusqueda = "SELECT * FROM superheroes WHERE nombre like :nombre";
    $consulta = $db->prepare($sqlBusqueda);
    $aParametros = array(":nombre"=> $_POST["busqueda"]);
    $consulta->execute($aParametros);
    $resultado = $consulta->fetchAll();
    echo count($resultado). " resultado encontrado<br>";
    foreach($resultado as $key => $value){
        echo "Nombre: ".$value["nombre"];
    }
}