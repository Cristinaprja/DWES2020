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
                    echo "<h2>FORMULARIOS</h2>";
                        echo "<p><a href='index.php?page=basico'>Sistema de autentificación básico</a></p>";
                        echo "<p><a href='index.php?page=perfiles'>Perfiles de usuario</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "basico":
                            echo "Sistema de autentificación básico</p>";
                            include "basico.php";
                        break;
                        case "perfiles":
                            echo "Perfiles de usuario</p>";
                            include "perfiles.php";
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a target=\"_blank\" href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/formularios\">Enlace GitHub</a></button>";
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