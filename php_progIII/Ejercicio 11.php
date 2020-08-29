<?php

function CalcularPotencia($numero){
    echo "Las primeras cuatro potencias de $numero son:<br/>";
    for ($i=1; $i < 5 ; $i++) {  
        echo pow($numero, $i)."<br/>";       
    }
}
for ($i=1; $i < 5 ; $i++) { 
    CalcularPotencia($i);
}

?>