<?php

    abstract class FiguraGeometrica{
        
        protected string $_color;
        protected float $_superficie;
        protected float $_perimetro;

        function __construct(){
        
        }

        public function GetColor(){
            return $this->_color;
        }

        public function SetColor(string $_color){
            $this->_color = $_color;
            /*
            CAMBIAR COLOR A FUENTE PHP
            echo "<font color=\"red\">lo que sea</font>";
            echo "<font color=\"#000000\">lo que sea</font>";*/
        }

        public function __toString(){
        $this->Dibujar();
        }

        public abstract function Dibujar();
        protected abstract function CalcularDatos();
    }


?>






?>