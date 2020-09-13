<?php

$palabra = $_POST['palabra'];
$max = $_POST['max'];

function InvertirPalabra($palabra, $max){
    if(strlen($palabra) <= $max){
        if(strcmp($palabra,"Recuperatorio") == 0){
            return 1;
        }elseif (strcmp($palabra,"Parcial") == 0) {
            return 1;
        }elseif (strcmp($palabra,"Programacion") == 0) {
            return 1;
        }else {
            return 0;
        }
    }else {
        return 0;
    }
}

echo InvertirPalabra($palabra, $max);



?>