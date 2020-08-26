<?php

$numeroUno=1;
$numeroDos=5;
$numeroTres=4;

if($numeroUno < $numeroDos && $numeroUno > $numeroTres || $numeroUno > $numeroDos && $numeroUno < $numeroTres){
    echo "El numero del medio es $numeroUno";
}
    elseif ($numeroDos < $numeroUno && $numeroDos > $numeroTres || $numeroDos > $numeroUno && $numeroDos < $numeroTres) {
        echo "El numero del medio es $numeroDos";
    }elseif ($numeroDos == $numeroUno || $numeroDos == $numeroTres  || $numeroUno == $numeroTres) {
        echo "No hay valor medio";
    }
    else {
        echo "El numero del medio es $numeroTres";
    }
?>