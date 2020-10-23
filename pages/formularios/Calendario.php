<?php
class Calendario {
    private $mes;
    private $annyo;
    private $DIAS_SEMANA = 7;
    private $dias = array("L", "M", "X", "J", "V", "S", "D");
    private $festivosNacionales = array(
        1 => array(1, 6),
        2 => array(),
        3 => array(),
        4 => array(),
        5 => array(1),
        6 => array(),
        7 => array(),
        8 => array(15),
        9 => array(),
        10 => array(12),
        11 => array(),
        12 => array(8,25)
    );
    private $festivosAndalucia = array(
        1 => array(),
        2 => array(28),
        3 => array(),
        4 => array(),
        5 => array(),
        6 => array(),
        7 => array(),
        8 => array(15),
        9 => array(),
        10 => array(),
        11 => array(1),
        12 => array(7)
    );
    
    private $huecosBlancos;
    private $diasDelMes;
    private $diaActual;
    private $mesActual;
    public function __construct($mes, $annyo) {
        $this->mes = $mes;
        $this->annyo = $annyo;
        $this->diaActual = date(("j"));
        $this->mesActual = date("n");
    }
    public function calcularCalendario(){
        //Calcular Semana Santa
        $domingoPascua = date("j", easter_date($this->annyo));
        $mesDePascua = date("m", easter_date($this->annyo));
        $juevesDePascua = $domingoPascua - 3;
        array_push($this->festivosAndalucia[$mesDePascua-1],$juevesDePascua);
        array_push($this->festivosNacionales[$mesDePascua-1],($juevesDePascua+1)); 
        
        $this->diasDelMes = cal_days_in_month(CAL_GREGORIAN, $this->mes, $this->annyo);
        $primerDia=date("N", mktime(0,0,0,$this->mes,1,$this->annyo)); 
        $this->huecosBlancos = $this->DIAS_SEMANA - $primerDia;
    }

    public function imprimirCalendario(){
        echo "Calendario del mes ".$this->mes." del año ".$this->annyo;
        echo "<table border=\"1px solid black\">";
        echo "<tr>";
        for($i=0; $i<$this->DIAS_SEMANA; $i++){
            echo "<th>".$this->dias[$i]."</th>";
        }
        echo "</tr>";
        for($i=0; $i<$this->huecosBlancos; $i++){
            echo "<td></td>";
        }
        for($i=1; $i<$this->diasDelMes; $i++){
            if(($i+$this->huecosBlancos)%7==0){
                echo "<td style=\"background-color: red\">$i</td>";
                echo "<tr>";
            }elseif(in_array($i, $this->festivosNacionales[$this->mes])){
                echo "<td style=\"background-color: red\">$i</td>";
            }elseif(in_array($i, $this->festivosAndalucia[$this->mes])){
                echo "<td style=\"background-color: orange\">$i</td>";
            }elseif($i == $this->diaActual && $this->mes == $this->mesActual){
                echo "<td style=\"background-color: green\">$i</td>";
            }else{
                echo "<td>$i</td>";
            }
        }
        echo "</table>";
    }
}
?>