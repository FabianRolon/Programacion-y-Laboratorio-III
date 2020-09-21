<?php

class ManejadorArchivos{

    public static function GuardarTxt($nombreArchivo, $datos){
        $archivo = fopen($nombreArchivo, "a");
        $retorno = fwrite($archivo, $datos);
        fclose($archivo);

        return $retorno;
    }

    public static function GuardarJson($nombreArchivo, $objArr){     
        $archivo = fopen($nombreArchivo, "w");
        $retorno = fwrite($archivo, json_encode($objArr));
        fclose($archivo);       

        return $retorno;       
    }

    public static function AgregarJson($nombreArchivo, $objeto){
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

    public static function serializar_guardar($nombreArchivo, $datos){
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
            $archivo = fopen($nombreArchivo, "w");
            $retorno = fwrite($archivo, serialize($datos));	
            fclose($archivo);            
        }
        return $retorno; 
    }

    //Leer-----------------------------------------------------------------------------------
    public static function LeerJson($nombreArchivo){
        if(file_exists($nombreArchivo) && filesize($nombreArchivo)>0){
            $archivo = fopen($nombreArchivo, "r");
            $arrayJson = json_decode(fread($archivo,filesize($nombreArchivo)));
            fclose($archivo);

            return $arrayJson;                   //hay que instanciar cada elem, devuelve stdClass                  
        }
        return null; 
    }


    public static function leerTodoRaw($nombreArchivo){
        if(file_exists($nombreArchivo) && filesize($nombreArchivo)>0){
            $archivo = fopen($nombreArchivo, "r");
            $retorno= fread($archivo,filesize($nombreArchivo));	                  
            fclose($archivo); 
            return $retorno;                      
        }
        return null;
    }

    public static function leerTodoTxt($nombreArchivo){
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