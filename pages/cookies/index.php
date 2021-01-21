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
                    echo "<h2>COOKIES</h2>";
                        echo "<p><a href='index.php?page=cookie'>Cookie con duración limitada</a></p>";
                        echo "<p><a href='index.php?page=navegador'>Navegador con cookies</a></p>";
                        echo "<p><a href='index.php?page=formulario'>Formulario con cookie</a></p>";
                        echo "<p><a href='index.php?page=visitas'>Contador de visitas</a></p>";
                        echo "<p><a href='index.php?page=tiempo'>Tiempo transcurrido con cookie</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "cookie":
                            echo "Cookie con duracion limitada</p>";
                            include "cookie.php";
                        break;
                        case "navegador":
                            echo "Navegador con cookies</p>";
                            include "navegador.php";
                        break;
                        case "formulario":
                            echo "Formulario con cookie</p>";
                            include "formulario.php";
                        break;
                        case "visitas":
                            echo "Contador de visitas</p>";
                            include "visitas.php";
                        break;
                        case "tiempo":
                            echo "Tiempo transcurrido con cookie</p>";
                            include "tiempo.php";
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a target=\"_blank\" href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/cookies\">Enlace GitHub</a></button>";
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