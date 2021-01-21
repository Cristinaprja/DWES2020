<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ejercicios DWES</title>
    <link rel="stylesheet" href="../../styles/style.css" type="text/css"/>
</head>
<body>
    <header>
        <?php
            include "../../include/header.php";
        ?>
    </header>
    <main>
        <?php
            echo "<div id=\"listado\">";
                echo "<div>";
                    echo "<form action=\"index.php\" method=\"post\">";
                    echo "<h2>FICHEROS</h2>";
                    echo "<p><a href=\"index.php?page=subida\">Subida de Ficheros</a></p>";
                        echo "<p><a href=\"index.php?page=usuarios\">Creación de usuarios</a></p>";
                        echo "<p><a href=\"index.php?page=galeria\">Galeria imágenes</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id=\"ejercicio\">";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "subida":
                            echo "Subida de ficheros</p>";
                            include "subida.php";
                        break;
                        case "usuarios":
                            echo "Creación de usuarios</p>";
                            include "usuarios.php";
                        break;
                        case "galeria":
                            echo "Galeria imágenes</p>";
                            include "galeria.php";
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a target=\"_blank\" href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/ficheros\">Enlace GitHub</a></button>";
            echo "</div>";
        ?>
    </main>
    <footer>
        <?php
            include "../../include/footer.php";
        ?>
    </footer>
</body>
</html>