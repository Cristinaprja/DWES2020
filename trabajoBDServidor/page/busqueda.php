<?php
    if(!($_SESSION["logged"] )){
        header("Location: index.php");
    }

    echo "<form class='form-group' action='index.php?page=busqueda' method=\"post\">";
        echo "<br/><br/>";
        echo "<div class='text-center' ";
            echo "<label >Buscar: <input type='text' name='busqueda'></label>";
            echo "<input type='submit' value='Buscar' name='buscar'> | <button><a href=index.php?page=registroAlumno>Nuevo Alumno</a></button>";
        echo "</div>";
    echo "</form>";

    if (isset($_POST["buscar"])){        
        $mostrarLista = $_SESSION["user"]->buscarInfo($_POST["busqueda"]);
        echo "<br/><br/><p class='text-center'>Lista de Alumnos</p>";
        echo "<table class=\"table table-bordered\">";
        echo "<tr><th>Nombre</th><th>Curso</th><th>Tutor</th><th>Incidencias</th><th>Fecha de Baja</th>
            <th>Fecha de Alta</th><th>D. Responsable</th><th>Teléfono</th><th>Observaciones</th><th>Fecha Actual</th></tr>";
        foreach ($mostrarLista as $value){
            echo "<tr>";
                echo "<td>"; 
                    echo $value['nombre'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['curso'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['tutor'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['incidencias'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fecha_baja'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fecha_alta'];
                echo "</td>";
                echo "<td>"; 
                    if($value['d_responsable']){
                        echo "<input type=\"checkbox\" checked disabled></input>";
                    }else{
                        echo "<input type=\"checkbox\"  disabled></input>";
                    }
                echo "</td>";
                echo "<td>"; 
                    echo $value['telefono'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['observaciones'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fecha_actual'];
                echo "</td>";
                //echo "<td><a href='"."index.php?page=envioCorreo&id=".$value["id"]."'><button>Editar</button></a></td>";
                echo "<td><a href='"."index.php?page=envioCorreo&control_hash=".$value["control_hash"]."'><button>Editar</button></a></td>";
                
            echo "</tr>";
        }    
        echo "</table>";      
    } else{
        $mostrarLista = $_SESSION["user"]->obtenerCincoUltimos();
        echo "<br/><br/><p class='text-center'>Lista de Alumnos</p>";
        echo "<table class=\"table table-bordered\">";
        echo "<tr><th>Nombre</th><th>Curso</th><th>Tutor</th><th>Incidencias</th><th>Fecha de Baja</th>
            <th>Fecha de Alta</th><th>D. Responsable</th><th>Teléfono</th><th>Observaciones</th><th>Fecha Actual</th></tr>";
        foreach ($mostrarLista as $value){
            echo "<tr>";
                echo "<td>"; 
                    echo $value['nombre'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['curso'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['tutor'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['incidencias'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fecha_baja'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fecha_alta'];
                echo "</td>";
                echo "<td>"; 
                    if($value['d_responsable']){
                        echo "<input type=\"checkbox\" checked disabled></input>";
                    }else{
                        echo "<input type=\"checkbox\"  disabled></input>";
                    }
                echo "</td>";
                echo "<td>"; 
                    echo $value['telefono'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['observaciones'];
                echo "</td>";
                echo "<td>"; 
                    echo $value['fecha_actual'];
                echo "</td>";
                //echo "<td><a href='"."index.php?page=envioCorreo&id=".$value["id"]."'><button>Editar</button></a></td>";
                echo "<td><a href='"."index.php?page=envioCorreo&control_hash=".$value["control_hash"]."'><button>Editar</button></a></td>";
            echo "</tr>";
        }    
        echo "</table>";
    }

?>