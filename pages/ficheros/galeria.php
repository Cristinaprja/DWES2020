<?php
/**
 * Diseña e implementa una galería de fotos con las imágenes guardadas en un directorio. 
 * Permite la subida de imágenes con un formulario
 * @author Cristina Prieto Jalao
 */
session_start();

echo "<a href=\"cerrarSesion.php\">Cerrar Sesión</a>";
echo "<form action=\"index.php?page=galeria\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<p><label>Imagen: <input type=\"file\" name=\"fichero\"/></label></p>";
    echo "<p><input type=\"submit\" name=\"subir\" value=\"Subir\"/></p>";
echo "</form>";

if(isset($_POST["subir"])){
    $extensionesPermitidas = array("gif", "jpeg", "jpg", "png");
    $extensionFichero = explode(".", $_FILES["fichero"]["name"]);
    $extension = end($extensionFichero);

    if($_FILES["fichero"]["type"] == "image/gif"
        || $_FILES["fichero"]["type"] == "image/jpeg" 
        || $_FILES["fichero"]["type"] == "image/jpg" 
        || $_FILES["fichero"]["type"] == "image/png"
        && in_array($extension, $extensionesPermitidas)){

        if(file_exists("galeria/".$_FILES["fichero"]["name"])){
            echo $_FILES["fichero"]["name"]." sigue existiendo<br>";

            $directorio = dir("galeria");
            while (($archivo = $directorio->read()) !== false){
                if((strpos($archivo,"jpg") !== false) || (strpos($archivo,"jpeg") !== false) || (strpos($archivo,"png") !== false))
                echo "<img src=\"galeria/".$archivo."\" width=\"100px\"><br>";
            }
            $directorio->close();

        }else{
            move_uploaded_file($_FILES["fichero"]["tmp_name"], "galeria/".$_FILES["fichero"]["name"]);
            echo "Store in: "."galeria/".$_FILES["fichero"]["name"]."<br>";
            echo "Imagen subida: ";
            echo "<img src=\"galeria/".$_FILES["fichero"]["name"]."\" width=\"100px\"/><br>";
        }
    }else{
        echo "<p color=\"red\">Formato no válido</p>";
    }
}
?>