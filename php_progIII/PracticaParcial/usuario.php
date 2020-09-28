<?php

require_once './PracticaParcial/ManejadorArchivos.php';

class Usuario extends ManejadorArchivos{
    
    public $email;
    public $clave;

    public function __construct($email, $clave){
        $this->email = $email;
        $this->clave = $clave;
    }

    public function __set($name, $value)
    {
        if($name == 'email'){
            $this->email = $value;
        }elseif ($name == 'clave') {
            $this->clave = $value;
        }else {
            echo 'La variable no existe';
        }
    }

    public function __get($name){
        if($name == 'email'){
            return $this->email;
        }elseif ($name == 'clave') {
            return $this->clave;
        }else {
            echo 'La variable no existe';
        }
    }
    function LeerUsuarios(){
        $lista = parent::LeerJson("usuarios.json");
        $listaUsuarios = array();
        foreach ($lista as $value) {
            $instanciaUsuario = new Usuario($value->email, $value->clave);
            array_push($listaUsuarios, $instanciaUsuario);
        }
        return $listaUsuarios;
    }

    function GuardarUsuario(){
        if(!file_exists("usuarios.json")){
            parent::GuardarJson("usuarios.json",$this);
        }else {
            $arrayUsuarios = parent::LeerJson("usuarios.json");
            if ($arrayUsuarios != null) {
                foreach ($arrayUsuarios as $key => $value) {
                    if($key == 'email' && $value == $this->email)
                        return false;
                    $instanciarUsuario = new Usuario($arrayUsuarios['email'], $arrayUsuarios['clave']);
                    array_push($arrayUsuarios, $instanciarUsuario);
                }
                array_push($arrayUsuarios, $this);
                parent::GuardarJson("usuarios.json", $arrayUsuarios);
                return true;
            }
        }
    }

    function __toString()
    {
        return $this->email."*".$this->clave;
    }


}