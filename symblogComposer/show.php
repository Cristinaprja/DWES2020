<?php
// include "datos/datos.php";
require_once "vendor/autoload.php";
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'symblog',
    'username'  => 'symblog',
    'password'  => 'symblog',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$blogs = Blog::all();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    <link href="../css/screen.css" type="text/css" rel="stylesheet" />
    <link href="../css/sidebar.css" type="text/css" rel="stylesheet" />
    <link href="../css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
    <section id="wrapper">
    <header id="header">
        <div class="top">
        <nav>
            <ul class="navigation">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/blogs/add">AddBlog</a></li>
            </ul>
        </nav>
        </div>
        <hgroup>
            <h2><a href="/">symblog</a></h2>
            <h3><a href="/">creating a blog in Symfony2</a></h3>
        </hgroup>
    </header>   
        <section class="main-col">

            <?php
             if(isset($_GET["id"])){
                $id = $_GET["id"];
                echo "<article class=\"blog\">
                        <div class=\"date\">
                            <time datetime=\"\">".date_format($blogs[$id-1]["created_at"],'d-m-Y')." </time>
                        </div>
                        <header>
                            <h2><a href=\"index.php?route=show&id=$id\">".$blogs[$id-1]["title"]."</a></h2>
                        </header>
                        <img src=\"../img/".$blogs[$id-1]["imagen"]."\" />
                        <div class=\"snippet\">
                            <p>".$blogs[$id-1]["blog_id"]."</p>
                            <p class=\"continue\"><a href=\"#\">Continue reading...</a></p>
                        </div>
                        <footer class=\"meta\">
                            <p>Comments: <a href=\"#\">Numero comentarios:</a></p>
                            <p>Posted by <span class=\"highlight\">".$blogs[$id-1]["author"]."</span> at 07:06PM</p>
                            <p>Tags: <span class=\"highlight\">".$blogs[$id-1]["tags"]."</span></p>
                        </footer>
                    </article>";
                    $comments = Blog::find($id)->comments()->get();
                    foreach ($comments as $key => $value) {
                        echo $value->user;
                    }
                    // for($i=0; $i<size($comments); $i++){
                        // print_r(Blog::find($i));
                        // foreach(Blog::find($id)->comments()->where("blog", $id) as $comment){
                        //     print_r($comment);
                        //     echo "aaa<br><br>";
                            // if($comment["getBlog"] == $id){
                                // echo "<article class=\"comment\">
                                //     <p>Author: ".$comment["user"]."</br>
                                //     Comentario: ".$comment["comment"]."</br>";
                                //     if($comment["created_at"]){
                                //         echo "Fecha creación: ".date_format($comment["created_at"], "Y-m-d")."</br>";
                                //     }
                                // echo "</article>";
                            // }
                        // }
                    // }
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