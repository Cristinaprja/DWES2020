<?php
    require "./class/phpmailer/class.phpmailer.php";


    /* if(!($_SESSION["logged"] )){
        header("Location: index.php");
    }  */

    if(!($_SESSION["logged"] )){

        echo "<p class='text-center'><b>Formulario de Edición</b></p>";
        echo "<form class='form-horizontal' style='margin:0 auto' action='index.php?page=envioCorreo&id=".$_GET["id"]."' method='post'><br/>";
            echo "<div class='form-group'>";
                echo "<label class='col-lg-4' >Fecha de Alta:</label>";
                echo "<div class='col-lg-5'>";
                    echo "<input type='date' class='form-control' name='fecha_alta'>";
                echo "</div>";
                echo "<label class='col-lg-4' >Fecha de Baja:</label>";
                echo "<div class='col-lg-5'>";
                    echo "<input type='date' class='form-control' name='fecha_baja'>";
                echo "</div>";
                echo "<label class='col-lg-4' class=form-check-label'>D.Responsabilidad:</label>";
                echo "<div class='col-lg-5'>";
                    echo "<input type='checkbox' class='form-check-label' name='d_responsable'>";
                echo "</div>";
                echo "<label class='col-lg-4' >Observaciones:</label>";
                echo "<div class='col-lg-5'>";
                    echo "<input type='text' class='form-control' name='observaciones'>";
                echo "</div>";
                echo "<input type='submit' name='editar' value='Editar' class='btn btn-primary'  style='margin-top:20px' >";
            echo "</div>";
        echo "</form>";
        
        if(isset($_POST["editar"])){
            if(!isset($_POST['d_responsable']) == "on"){
                $responsable = 0;
            }else{
                $responsable = 1;
            }

            $datos_alumno = array(
                //'control_hash'=> $_SESSION["user"]->getHashbyId($_GET["id"])[0]["control_hash"],
                'id'=> $_GET["id"],
                'fecha_alta'=>limpiarDatos($_POST['fecha_alta']),
                'fecha_baja'=>limpiarDatos($_POST['fecha_baja']),
                'd_responsable'=>$responsable,
                'observaciones'=>limpiarDatos($_POST['observaciones']),
            );

            $_SESSION['user']->edit($datos_alumno);
        }
        
    } 
    else{
        echo "<form class='form-group' action='index.php?page=envioCorreo&id=".$_GET["id"]."' method=\"post\">";
            echo "<br/><br/>";
            echo "<div class='text-center' ";
                echo "<label >Correo Electrónico: <input type='email' name='correo'></label>";
                echo "<input type='submit' value='Enviar' name='enviar'></a></button>";
            echo "</div>";
        echo "</form>";
    
        if(isset($_POST["enviar"])){
            $mail = new PHPMailer();
            $mail->CharSet = 'utf-8';
            $mail->From = 'secretariadwes@gmail.com';
            $mail->FromName = 'Secretaria Virtual Gran Capitán';
            $mail->Subject = "Claves firma acceso Secretaria Virtual";
            $mail->addAddress($_POST["correo"],'');
            $mail->msgHTML("<a href='http://localhost/trabajoBDServidor/index.php?page=envioCorreo&id=".$_GET["id"]."'>Acceso a formulario</a>
            Su método para loguearse es introduciendo el siguiente código.<b>".$_SESSION["user"]->getHashbyId($_GET["id"])[0]["control_hash"]."</b>");
    
            if($mail->send()){
                echo "Se ha enviado el email";
            }else{
                echo "No se ha podido enviar el email";
            }
        }
    }


    