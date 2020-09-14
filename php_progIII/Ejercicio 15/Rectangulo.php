<?php

    require_once ('FiguraGeometrica.php');

    class Rectangulo extends FiguraGeometrica{
        
        
        protected float $_ladoUno;
        protected float $_ladoDos;

        function __construct(float $l1, float $l2){
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;       
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
            $this->_perimetro = $this->_ladoUno + $this->_ladoDos;
            $this->_superficie = $this->_ladoUno * $this->_ladoDos;
        }
    }
?>