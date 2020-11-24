<?php
/**
 * Clase Usuario para el ejercicio usuarios.php
 * @author Cristina Prieto Jalao
 * 24/11/2020
 */
class Usuario{
    public $user;
    public $password;

    public function __construct($user, $password){
        $this->user = $user;
        $this->password = $password;
    }
    public function getUser(){
        return $this->user;
    }

    public function getPassword(){
        return $this->password;
    }
}
?>