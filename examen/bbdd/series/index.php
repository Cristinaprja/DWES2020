<?php
   include "config/config.php";
   include "class/DBAbstractModel.php";
   include "class/Usuario.php";
//    include "class/Serie.php";

   session_start();
   
    if(!isset($_SESSION["perfil"])){
        // $_SESSION["serie"] = Serie::getInstancia();
        $_SESSION["usuario"] = Usuario::getInstancia();
        $_SESSION["perfil"]="invitado";
        $_SESSION["mensaje"] = "";
    }

    if(isset($_POST["iniciarSesion"])){
        $arrayUsuario = $_SESSION["usuario"]->get($_POST["user"]);
        if(sizeof($arrayUsuario) == 1 && $arrayUsuario[0]["passwd"] == $_POST["pass"]){  
            $_SESSION["id_usuario"] = $arrayUsuario[0]["id"];
            $_SESSION["usuario"] = $arrayUsuario[0]["usuario"];
            $_SESSION["perfil"] = $arrayUsuario[0]["perfil"];

            if ($_SESSION["perfil"] == "admin") {
                header("Location:index.php?page=admin");
            }   
            if (($_SESSION["perfil"] == "premium") || ($_SESSION["perfil"] == "basico") ) {
                header("Location:index.php?page=registrado");
            }   
        }
    }
    if(isset($_POST["cerrarSesion"])){
        include "include/logout.php";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Series TV</title>
</head>
<body>
    <?php include "include/header.php"; ?>
    <?php
    if($_SESSION["perfil"] == "invitado"){
        include "include/login.php";
        echo "<input type='submit' value='Darse de alta'>";
    }else{
        echo "<form action='index.php' method='post'>";
            echo "<input type='submit' name='cerrarSesion' value='Cerrar Sesión'>";
        echo "</form>";
    }
    ?>
    <main>
        <?php
        if (isset($_GET["page"])){
            if ($_GET["page"]=="index") {
                header("Location: index.php");
            }else if ($_GET["page"]=="admin") {
                include ("pages/admin.php"); 
                
            }else if (($_GET["page"]=="registrado")) {
                include ("pages/registrado.php"); 
            }
        }
        ?>
    </main>
</body>
<footer><?php include "include/footer.php" ?></footer>
</html>