<?php
if(!($_SESSION["logged"] )){
    header("Location: index.php");
}
if (isset($_POST['registrar'])) {
    if(!isset($_POST['d_responsable']) == "on"){
        $responsable = 0;
    }else{
        $responsable = 1;
    }
    $user_data = array(
        'nombre' => limpiarDatos($_POST['nombre']),
        'curso' => limpiarDatos($_POST['curso']),
        'tutor' => limpiarDatos($_POST['tutor']),
        'incidencias' => limpiarDatos($_POST['incidencias']),
        'fecha_alta' => limpiarDatos($_POST['fecha_alta']),
        'fecha_baja' => limpiarDatos($_POST['fecha_baja']),
        'd_responsable' => $responsable,
        'telefono' => limpiarDatos($_POST['telefono']),
        'observaciones' => limpiarDatos($_POST['observaciones']),
    );
    $_SESSION["user"]->set($user_data);
}
    echo "<p class='text-center'><b>Formulario de Registro</b></p>";
    echo "<form class='form-horizontal' style='margin:0 auto' action='index.php?page=registroAlumno' method='post'><br/>";
        echo "<div class='form-group'>";
            echo "<label class='col-lg-4' >Nombre:</label>";
            echo "<div class='col-lg-5'>";
                echo "<input type='text' class='form-control' name='nombre'>";
            echo "</div>";
            echo "<label class='col-lg-4' >Curso:</label>";
            echo "<div class='col-lg-5'>";
                echo "<input type='text' class='form-control' name='curso'>";
            echo "</div>";
            echo "<label class='col-lg-4' >Tutor:</label>";
            echo "<div class='col-lg-5'>";
                echo "<input type='text' class='form-control' name='tutor'>";
            echo "</div>";
            echo "<label class='col-lg-4' >Incidencias:</label>";
            echo "<div class='col-lg-5'>";
                echo "<input type='text' class='form-control' name='incidencias'>";
            echo "</div>";
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
            echo "<label class='col-lg-4' >Teléfono:</label>";
            echo "<div class='col-lg-5'>";
                echo "<input type='tel' class='form-control' name='telefono'>";
            echo "</div>";
            echo "<label class='col-lg-4' >Observaciones:</label>";
            echo "<div class='col-lg-5'>";
                echo "<input type='text' class='form-control' name='observaciones'>";
            echo "</div>";
            echo "<input type='submit' name='registrar' value='Registrar' class='btn btn-primary'  style='margin-top:10px'>";
        echo "</div>";
    echo "</form>";
?>