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
                        echo "<h3>Formularios</h3>";
                        echo "<p><a href='index.php?page=calendario1'>Calendario con festivos autonómicos</a></p>";
                        echo "<p><a href='index.php?page=curriculum1'>Curriculum</a></p>";
                        echo "<p><a href='index.php?page=continentes'>Formulario con los paises de los continentes</a></p>";
                        echo "<p><a href='index.php?page=sumaNumeros'>Suma de números</a></p>";
                        echo "<p><a href='index.php?page=vIrregulares'>PROYECTO - Verbos Irregulares</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "calendario1":
                            echo "Calendario con festivos autonómicos</p>";
                            include "calendario1.php";
                        break;
                        case "curriculum1":
                            echo "Formulario para curriculum</p>";
                            include "curriculum1.php";
                        break;
                        case "continentes":
                            echo "Formulario de continentes</p>";
                            include "continentes.php";
                        break;
                        case "sumaNumeros":
                            echo "Suma de dos números introducidos</p>";
                            include "sumaNumeros.php";
                        break;
                        case "vIrregulares":
                            echo "Verbos irregulares v1. </p>";
                            include "vIrregulares.php";
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a href=\"\">Enlace GitHub</a></button>";
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