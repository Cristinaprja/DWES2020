<?php
include "datos/datos.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
        <link href="css/screen.css" type="text/css" rel="stylesheet" />
        <link href="css/sidebar.css" type="text/css" rel="stylesheet" />
        <link href="css/blog.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" href="img/favicon.ico" />
    </head>
    <body>
        <section id="wrapper">
            <header id="header">
                <div class="top">
                    <nav>
                        <ul class="navigation">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <hgroup>
                    <h2><a href="index.html">symblog</a></h2>
                    <h3><a href="index.html">creating a blog in Symfony2</a></h3>
                </hgroup>
            </header>   
            <section class="main-col">
                <?php
                echo "<form action=\"addBlog.php\" method=\"post\">";
                    echo "<div><ul>";
                    echo "<li><label>Title </label><input type=\"text\" name=\"title\" /></li>";
                    echo "<li><label>Description </label><textarea name=\"description\"></textarea></li>";
                    echo "<li><label>Tags </label><input type=\"text\" name=\"tags\" /></li>";
                    echo "<li><label>Author </label><input type=\"text\" name=\"author\" /></li>";
                    echo "<li><input type=\"submit\" name=\"Enviar consulta\" /></li>";
                    echo "</ul></div>";
                echo "</form>";
                ?>
            </section>
            <aside class="sidebar">
                <section class="section">
                    <header>
                        <h3>Tag Cloud</h3>
                    </header>
                    <p class="tags">
                        <span class="weight-1">magic</span>
                        <span class="weight-5">symblog</span>
                        <span class="weight-4">movie</span>
                    </p>
                </section>
                <section class="section">
                    <header>
                        <h3>Latest Comments</h3>
                    </header>
                    <article class="comment">
                        <header>
                            <p class="small"><span class="highlight">Carlos Aguilera</span> commented on
                            <a href="#">A day with Symfony2</a>
                            </p>
                        </header>
                            <p>Comentario Usuario</p>
                    </article>
                </section>
            </aside>
            <div id="footer">
                dwes symblog - created by <a href="#">dwes</a>
            </div>
        </section>
    </body>
</html>