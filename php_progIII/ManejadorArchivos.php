<?php

class ManejadorArchivos{

    protected static string $nombreArchivo;

    protected function __construct($nombreArchivo)
    {
        $this->nombreArchivo = $nombreArchivo;
    }

    public function __set($name, $value){
        if($name == 'nombreArchivo'){
            $this->nombreArchivo = $value;
        }else {
            return "No existe la variable";
        }
    }

    protected static function GuardarTxt($datos){
        $archivo = fopen(self::$nombreArchivo, "a");
        $retorno = fwrite($archivo, $datos);
        fclose($archivo);

        return $retorno;
    }

    protected static function GuardarJson($objArr){     
        $archivo = fopen(self::$nombreArchivo, "w");
        $retorno = fwrite($archivo, json_encode($objArr));
        fclose($archivo);       

        return $retorno;       
    }

    protected static function AgregarJson($nombreArchivo, $objeto){
        $retorno = 0;
        $arrayJson = self::LeerJson($nombreArchivo);
        if(!$arrayJson)
            $arrayJson = array();
            
        if(array_push($arrayJson,$objeto) > 0){
            $archivo = fopen($nombreArchivo, "w");
            $retorno = fwrite($archivo, json_encode($arrayJson));
            fclose($archivo);            
        }
        return $retorno;       
    }

    protected static function serializar_guardar($nombreArchivo, $datos){
        $archivo = fopen($nombreArchivo, "w");
        $retorno = fwrite($archivo, serialize($datos));	
        fclose($archivo);

        return $retorno;
    }

    public static function serializar_agregar($nombreArchivo, $nuevoDato){
        $retorno = 0;
        $datos= self::deserializar($nombreArchivo);
        if(!$datos){
            $datos = array();
        }
        if(array_push($datos,$nuevoDato)>0){
            $retorno = self::serializar_agregar($nombreArchivo, $datos);        
        }
        return $retorno; 
    }

    protected static function LeerJson(){
        if(file_exists(self::$nombreArchivo) && filesize(self::$nombreArchivo)>0){
            $archivo = fopen(self::$nombreArchivo, "r");
            $arrayJson = json_decode(fread($archivo,filesize(self::$nombreArchivo)));
            fclose($archivo);

            return $arrayJson;                 
        }
        return null; 
    }


    protected static function leerTodoRaw($nombreArchivo){
        if(file_exists($nombreArchivo) && filesize($nombreArchivo)>0){
            $archivo = fopen($nombreArchivo, "r");
            $retorno= fread($archivo,filesize($nombreArchivo));	                  
            fclose($archivo); 
            return $retorno;                      
        }
        return null;
    }

    protected static function leerTodoTxt($nombreArchivo){
        $archivo = fopen($nombreArchivo, "r");
        $retorno = array();
        while(!feof($archivo)) {
            $linea = explode('*', fgets($archivo));  
            if($linea > 1) 
                array_push($retorno,$linea);         
        }
        fclose($archivo);
        return $retorno;
    }

    public static function deserializar($nombreArchivo){
        $datosDeserializados= unserialize(self::leerTodoRaw($nombreArchivo));    //no necesita include 'Clase.php' si ya está incluido en index
        return $datosDeserializados;    //devuelve un array de objetos
    }
}