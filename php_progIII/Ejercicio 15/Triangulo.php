<?php

    require_once ('FiguraGeometrica.php');

    class Triangulo extends FiguraGeometrica{
        
        
        protected float $_altura;
        protected float $_base;

        function __construct(float $b, float $h){
        $this->_base = $b;
        $this->_altura = $h;      
        }

        public function Dibujar(){
            for ($i=0; $i <= $this->_ladoDos ; $i++) { 
                if($i == 0){
                    continue;
                }else{
                    echo "<font color=\"red\"><br/></font>";
                }    
                
                for ($j=0; $j < $this->_ladoUno ; $j++) { 
                    echo "<font color=\"$this->_color\">* </font>";
                }
            }
        }
        protected function CalcularDatos(){
            $lado = sqrt(pow(($this->_base/2),2)+pow($this->_altura,2)) ;
            $this->_perimetro = $this->_base + $lado * 2;
            $this->_superficie = $this->_base * ($this->_altura/2);
        }
    }
?>