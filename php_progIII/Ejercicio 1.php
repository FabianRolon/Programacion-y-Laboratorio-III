<?php 

$numero = 0;
$suma = 0;

while($suma < 1000){
    $numero++;
    $suma = $suma + $numero;
    if($suma < 1000)
        echo "$suma + $numero <br>";        
}


?>