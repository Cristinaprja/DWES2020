<?php
/**
 * Clase Perro para ejercicio chips.php
 * @author Cristina Prieto Jalao
 * 24/11/2020
 */
class Perro{
    public $nombre;
    public $imagen;
    public $raza;
    public $peso;  /**El peso puede ser entre 5kg y 50kg */
    public $animo; /**Feliz, triste*/
    public $inteligencia; /**Malo, regular, bueno y muy bueno */
    public $habilidades;
    
    public function __construct($arrayDatos){
        $this->nombre = $arrayDatos["nombre"];
        $this->raza = $arrayDatos["raza"];
        $this->imagen = $arrayDatos["imagen"];
        $this->peso = $arrayDatos["peso"];
        $this->animo = $arrayDatos["animo"];
        $this->inteligencia = $arrayDatos["inteligencia"];
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getRaza(){
        return $this->raza;
    }
    public function getImagen(){
        return $this->imagen;
    }
    public function getPeso(){
        return $this->peso;
    }
    public function getAnimo(){
        return $this->animo;
    }
    public function getInteligencia(){
        return $this->inteligneica;
    }

    //Metodos para los botones
    public function jugar(){
        $this->peso--;
        $this->animo = "feliz";
    }
    public function comer(){
        $this->peso++;
        $this->animo = "feliz";
    }
}
?>