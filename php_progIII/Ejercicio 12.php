<?php

function InvertirPalabra($string){
    $tamanio = strlen($string);
    $invertida =  "";
    for ($i = $tamanio - 1; $i >= 0; $i--) { 
        $invertida .= $string[$i];
    }
    return $invertida;
}

$palabra = $_POST['palabra'];
echo InvertirPalabra($palabra);

?>