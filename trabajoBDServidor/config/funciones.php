<?php
    /**
     * Función para logearse
     * @param user
     * @param password
     */
    function login($user, $password) {
        return ($user == "admin" && $password == "admin");
    }

    /**
     * Función para cerrar la sesión
     */
    function cerrarSesion(){
        session_unset();
        session_destroy();
        session_start();
        session_regenerate_id();
        header("Location:index.php");
    }

    /**
     * Función para limpiar la entrada de datos
     * @param limpiar
     */
    function limpiarDatos($limpiar){
        $error = trim($limpiar);
        $error = stripslashes($limpiar);
        $error =  htmlspecialchars($limpiar);
        return $error;
    }
?>