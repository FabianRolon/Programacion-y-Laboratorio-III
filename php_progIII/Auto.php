<?php

require_once '/xampp/htdocs/Programacion-y-Laboratorio-III/php_progIII/ManejadorArchivos.php';

class Auto extends ManejadorArchivos {
    public $_id;
    public  $_patente;
    public  $_color;
    public  $_precio;
    public  $_marca;
    public  $_fecha;

    public function __construct($id, $marca, $color, $precio, $patente = null, $fecha = null){
        $this->_id = $id;
        $this->_patente = $patente;
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha; 
    }

    // public function __construct2($patente, $marca, $color, $precio, $fecha = null)
    // {
    //     $this->_patente = $patente;
    //     $this->_marca = $marca;
    //     $this->_color = $color;
    //     $this->_precio = $precio;
    //     $this->_fecha = $fecha;        
    // }

    public function __get($name){
        switch ($name) {
            case '_id':
                return $this->_id;
            case '_patente':
                return $this->_patente;
            case '_marca':
                return $this->_marca;
            case '_color':
                return $this->_color;
            case '_precio':
                return $this->_precio;
            default:
                return "No se existe la varible";
            break;
        }
    }

    public function __set($name, $value){
        //hacer logica si el name que pasa existe.
        switch ($name) {
            case '_patente':
                $this->_patente = $value;
            case '_marca':
                $this->_marca= $value;
            case '_color':
                $this->_color= $value;
            case '_precio':
                $this->_precio= $value;
            default:
                "No se existe la varible";
            break;
        }
        $this->$name = $value;
    }

    public function __toString(){
        return $this->_id.'*'.$this->_marca."*".$this->_color."*".$this->_precio;        
    }

     function agregarImpuestos($impuestos){
        $this->_precio += $impuestos;
    }

    public function Save(){
        parent::$nombreArchivo = "auto.json";
        parent::GuardarJson($this);
    }






}






?>