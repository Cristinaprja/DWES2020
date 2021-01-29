<?php
include "datos/datos.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset=utf-8" />
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="index.php">symblog</a></h2>
                <h3><a href="index.php">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">

            <?php
             if(isset($_GET["id"])){
                $id = $_GET["id"];
                echo "<article class=\"blog\">
                        <div class=\"date\">
                            <time datetime=\"\">".date_format($blogs[$id-1]->getCreated(),'d-m-Y')." </time>
                        </div>
                        <header>
                            <h2><a href=\"show.php?id=$id\">".$blogs[$id-1]->getTitle()."</a></h2>
                        </header>
                        <img src=\"img/".$blogs[$id-1]->getImagen()."\" />
                        <div class=\"snippet\">
                            <p>".$blogs[$id-1]->getBlog()."</p>
                            <p class=\"continue\"><a href=\"#\">Continue reading...</a></p>
                        </div>
                        <footer class=\"meta\">
                            <p>Comments: <a href=\"#\">Numero comentarios:</a></p>
                            <p>Posted by <span class=\"highlight\">".$blogs[$id-1]->getAuthor()."</span> at 07:06PM</p>
                            <p>Tags: <span class=\"highlight\">".$blogs[$id-1]->getTags()."</span></p>
                        </footer>
                    </article>";
                    foreach($comments as $comment){
                        if($comment->getBlog() == $id){
                            echo "<article class=\"comment\">
                                <p>Author: ".$comment->getUser()."</br>
                                Comentario: ".$comment->getComment()."</br>";
                                if($comment->getCreated()){
                                    echo "Fecha creación: ".date_format($comment->getCreated(), "Y-m-d")."</br>";
                                }
                            echo "</article>";
                        }
                    }
             }
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