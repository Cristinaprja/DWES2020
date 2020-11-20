<?php
/**
 * Subida de ficheros
 * @author Cristina Prieto Jalao
 * 20/11/2020
 */
echo "<form action=\"index.php?page=subida\" method=\"post\" enctype=\"multipart/form-data\">";
echo "<p><label>Filename <input type=\"file\" name=\"fichero\"/></label></p>";
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
        && $_FILES["fichero"]["size"] < 25000
        && in_array($extension, $extensionesPermitidas)){
        if($_FILES["fichero"]["error"] > 0){
            echo "Error: ".$_FILES["fichero"]["error"]." </br>";
        }else{
            echo "Upload: ". $_FILES["fichero"]["name"]."</br>";
            echo "Type: ". $_FILES["fichero"]["type"]."</br>";
            echo "Size: ". $_FILES["fichero"]["size"]."</br>";
            echo "Temp file: ". $_FILES["fichero"]["tmp_name"]."</br>";

            if(file_exists("subidas/".$_FILES["fichero"]["name"])){
                echo $_FILES["fichero"]["name"]." sigue existiendo<br>";

                $directorio = dir("subidas");
                while (($archivo = $directorio->read()) !== false){
                    if((strpos($archivo,"jpg") !== false) || (strpos($archivo,"jpeg") !== false) || (strpos($archivo,"png") !== false))
                    echo "<img src=\"subidas/".$archivo."\" width=\"100px\"><br>";
                }
                $directorio->close();

            }else{
                move_uploaded_file($_FILES["fichero"]["tmp_name"], "subidas/".$_FILES["fichero"]["name"]);
                echo "Store in: "."subidas/".$_FILES["fichero"]["name"]."<br>";
                echo "Imagen subida: ";
                echo "<img src=\"subidas/".$_FILES["fichero"]["name"]."\" width=\"100px\"/><br>";
            }
        }
    }
}
?>