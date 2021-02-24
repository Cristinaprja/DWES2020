<?php
ini_set("display_errors", 1);
ini_set("display_startup_error", 1);
error_reporting(E_ALL);

session_start();

require_once "../vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/..");
$dotenv->load();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      =>  $_ENV["DB_HOST"],
    'database'  =>  $_ENV["DB_NAME"],
    'username'  =>  $_ENV["DB_USER"],
    'password'  =>  $_ENV["DB_PASS"],
    'charset'   =>  'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

$map->get("index", "/", ["controller" => "App\Controllers\IndexController", "action" => "indexAction"]);
$map->get("contact", "/contact", ["controller" => "App\Controllers\IndexController", "action" => "contactAction"]);
$map->get("about", "/about", ["controller" => "App\Controllers\IndexController", "action" => "aboutAction"]);
$map->get("show", "/blogs/show", ["controller" => "App\Controllers\IndexController", "action" => "showAction"]);
$map->get("addBlog", "/blogs/add", ["controller" => "App\Controllers\BlogsController", "action" => "getAddBlogAction", "auth" => true]);
$map->post("saveBlog", "/blogs/add", ["controller" => "App\Controllers\BlogsController", "action" => "getAddBlogAction", "auth" => true]);
$map->get("addUser", "/users/add", ["controller" => "App\Controllers\UsersController", "action" => "getAddUserAction", "auth" => true]);
$map->post("saveUser", "/users/add", ["controller" => "App\Controllers\UsersController", "action" => "getAddUserAction", "auth" => true]);
$map->get("formLogin", "/formLogin", ["controller" => "App\Controllers\AuthController", "action" => "formLogin"]);
$map->post("login", "/formLogin", ["controller" => "App\Controllers\AuthController", "action" => "postLogin"]);
$map->get("admin", "/admin", ["controller" => "App\Controllers\AdminController", "action" => "getIndex", "auth" => true]);
$map->get("logout", "/logout", ["controller" => "App\Controllers\AuthController", "action" => "getLogout", "auth" => true]);

$route = $_GET["route"] ?? "";

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if(!$route){
    echo "No route";
}else{
    $handlerData = $route->handler;
    $controllerName = $handlerData["controller"];
    $actionName = $handlerData["action"];

    $needsAuth = $handlerData["auth"] ?? false;
    $sessionUserId = $_SESSION["userId"] ?? null;

    if($needsAuth && !$sessionUserId){
        header("Location: /login");
    }else{
        $controller = new $controllerName;
        $response = $controller->$actionName($request);
        foreach($response->getHeaders() as $name => $values){
            foreach($values as $value){
                header(sprintf("%s: %s", $name, $value), false);
            }
        }
        // http_response_code($response->getStatusCode());
        echo $response->getBody();
    }
}
?>
