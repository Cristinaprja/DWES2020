<?php
    include ("./config/funciones.php");
    include ("./class/Usuario.php");
    include ("./config/config_dev.php");
    include ("./config/parameters.php");
	session_start();

	if (!isset($_SESSION["perfil"])){
        $_SESSION["user"] = Usuario::getInstancia();
        $_SESSION["perfil"] = "invitado";
        $_SESSION["logged"] = false;
    }

    if(isset($_POST["salir"])){
        cerrarSesion();
    }

    if (isset($_POST["login"])) {
        $user = $_POST["user"];
        $password = $_POST["pass"];
        if (login($user, $password)) {
            $_SESSION["logged"] = true;
            $_SESSION["usuario"] = $user;
            header("Location:index.php?page=busqueda");
        }
    }
?>

<!DOCTYPE html>
	<head>
		<title><?php echo $TITULO ?></title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
    </head>
	<body>
		<header class="navbar navbar-light bg-light">
            <?php include "include/cabecera.php"; 
            if (!$_SESSION["logged"]){ 
                include "include/login.php";               
            }else{
                include "include/logout.php";
            }?>
		</header>
            <main>
                <?php
                    if (isset($_GET["page"])){
                        if (($_GET["page"]=="index")) {
                            header("Location: index.php");
                        }else if (($_GET["page"]=="busqueda")) {
                            include ("./page/busqueda.php"); 
                        }else if (($_GET["page"]=="registroAlumno")) {
                            include ("./page/registroAlumno.php"); 
                        }else if (strpos(($_GET["page"]),"envioCorreo") !== false) {
                            include ("./page/envioCorreo.php"); 
                        }
                    }else{
                        include ("./page/home.php");
                    }
                ?>
            </main>
        </div>
		<footer>
            <?php include "include/footer.php";?>         
		</footer>
</html>