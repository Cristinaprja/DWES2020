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
            echo "<div id='listado'>";
                echo "<div>";
                    echo "<form action='index.php' method='post'>";
                        echo "<a href=\"index.php\"><h2>FUNCIONES</h2></a>";
                        echo "<p><a href='index.php?page=calculaletra'>Calcular letra DNI</a></p>";
                        echo "<p><a href='index.php?page=factoriza'>Factoriza</a></p>";
                        echo "<p><a href='index.php?page=usuarios'>Generación de usuarios</a></p>";
                        echo "<p><a href='index.php?page=sumaRecursiva'>Suma recursiva</a></p>";
                        echo "<p><a href='index.php?page=enlacesArray'>Enlaces creados con array</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "calculaletra":
                            echo "Calcular letra DNI</p>";
                            include "calculaletra.php";
                        break;
                        case "factoriza":
                            echo "Factoriza</p>";
                            include "factoriza.php";
                        break;
                        case "usuarios":
                            echo "Generación de usuarios</p>";
                            include "usuarios.php";
                        break;
                        case "sumaRecursiva":
                            echo "Suma recursiva</p>";
                            include "sumaRecursiva.php";
                        break;
                        case "enlacesArray":
                            echo "Enlaces creados con array </p>";
                            include "enlacesArray.php";
                        break;
                    }
                }
                if($_GET["page"]=="calculaletra" && $_GET["dni"]){
                    include_once "calculaletra.php";
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/funciones\">Enlace GitHub</a>";
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