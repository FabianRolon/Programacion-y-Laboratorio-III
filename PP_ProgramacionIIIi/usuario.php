<?php

require_once './ManejadorArchivos.php';
require_once './Auth.php';

class Usuario{
    public $email;
    public $password;
    public $tipo;
    public static $nombreDeArchivo = 'usuarios.txt';

    public function __construct($email, $password, $tipo){
        $this->email = $email;
        $this->password = $password;
        $this->tipo = $tipo;
    }

    public function __set($name, $value)
    {
        if($name == 'email'){
            $this->email = $value;
        }elseif ($name == 'password') {
            $this->password = $value;
        }elseif ($name == 'tipo') {
            $this->tipo = $value;
        }else {
            echo 'La variable no existe';
        }
    }

    public function __get($name){
        if($name == 'email'){
            return $this->email;
        }elseif ($name == 'password') {
            return $this->password;
        }elseif ($name == 'tipo') {
            return $this->tipo;
        }else {
            echo 'La variable no existe';
        }
    }
    
    public function Registrar(){      
        if (file_exists("usuarios.txt")) {
            $usuarios= ManejadorArchivos::deserializar(self::$nombreDeArchivo);
            if($usuarios){
                foreach($usuarios as $user){
                    if($this->email == $user->email)        
                        return false;            
                }   
            }   
        }else{
            $usuarios = array();
        }
        array_push($usuarios,$this);
        return ManejadorArchivos::serializar_guardar(self::$nombreDeArchivo,$usuarios);
    }
    public static function login($email, $password){
        $usuarios= ManejadorArchivos::deserializar(self::$nombreDeArchivo);
        if($usuarios){
            foreach($usuarios as $user){
                if($email == $user->email && $password==$user->password)
                    return Auth::crearJWT(Auth::generarPayload(array("email"=>$user->email, "tipo"=>$user->tipo)));
            }     
        }
        return false;
    }


    function __toString()
    {
        return $this->email."*".$this->password."*".$this->tipo;
    }
}