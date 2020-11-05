<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ejercicios DWES</title>
    <link rel="stylesheet" href="../../styles/style.css" type="text/css"/>
    <link rel="stylesheet" href="estilos.css" type="text/css"/>
</head>
<body>
    <header>
        <?php
            include "../../include/header.php";
        ?>
    </header>
    <main>
        <?php
            echo "<div id='listado'>";
                echo "<div>";
                    echo "<form action='index.php' method='post'>";
                    echo "<h2>SESIONES</h2>";
                        echo "<p><a href='index.php?page=contactos'>Agenda de contactos</a></p>";
                        echo "<p><a href='index.php?page=modulo'>Gestión académica</a></p>";
                        echo "<p><a href='index.php?page=buscaminas'>Buscaminas</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "contactos":
                            echo "Agenda de contactos</p>";
                            include "contactos.php";
                        break;
                        case "modulo":
                            echo "Gestión académica</p>";
                            include "modulo.php";
                        break;
                        case "buscaminas":
                            echo "Buscaminas</p>";
                            include "buscaminas.php";
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a target=\"_blank\" href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/sesiones\">Enlace GitHub</a></button>";
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