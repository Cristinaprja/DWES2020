<?php
ini_set("display_errors", 1);
ini_set("display_startup_error", 1);
error_reporting(E_ALL);

require_once "../vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use App\Models\Blog;

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
// require "../index.php";

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$routerContainer = new RouterContainer();
// var_dump($request->getUri()->getPath());

$map = $routerContainer->getMap();
$map->get("index", "/", "../index.php");
$map->get("addBlog", "/blogs/add", "../addBlog.php");
$map->get("contact", "/contact", "../contact.php");
$map->get("about", "/about", "../about.php");
$map->get("show", "/blogs/show", "../show.php");

$route = $_GET["route"] ?? "";

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if(!$route){
    echo "No route";
}else{
    require $route->handler;
}
// var_dump($route);

// echo "Visualizacion del handle";
// var_dump($route->handler);

// $route = $_GET["route"] ?? "";
// if(isset($route)){
//     switch($route){
//         case "home";
//         case "";
//             require "../index.php";
//         break;
//         case "about":
//             require "../about.php";
//         break;
//         case "contact":
//             require "../contact.php";
//         break;
//         case "addBlog":
//             require "../addBlog.php";
//         break;
//         case "show":
//             require "../show.php";
//         break;
//     }
// }
?>
