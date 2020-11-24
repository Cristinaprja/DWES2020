<?php
/**
 * Clase Perro para ejercicio chips.php
 * @author Cristina Prieto Jalao
 * 24/11/2020
 */
class Perro{
    private $nombre;
    private $peso;  /**El peso puede ser entre 5kg y 50kg */
    private $raza;
    private $edad;  /**La edad será en años */
    private $dueño;
    private $telefDueño;
    private $animo; /**Feliz, triste, hambriento */
    private $nivelSalud; /**Malo, regular, bueno y muy bueno */

    public function __construct($arrayDatos){
        $this->_nombre = $arrayDatos["nombre"];
        $this->_peso = $arrayDatos["peso"];
        $this->_raza = $arrayDatos["raza"];
        $this->_edad = $arrayDatos["edad"];
        $this->_dueño = $arrayDatos["dueño"];
        $this->_telefDueño = $arrayDatos["telefDueño"];
        $this->_animo = $arrayDatos["animo"];
        $this->_nivelSalud = $arrayDatos["dueño"];
    }

    
}
?>