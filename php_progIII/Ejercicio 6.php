<?php

for ($i=0; $i < 6; $i++) { 
    $vec[$i] = rand(1,10);
}
$contador = 0;
$suma = 0;
$promedio;

foreach ($vec as $value) {
    $suma += $value;
    $contador++;
}

$promedio = $suma/$contador;
echo $promedio;
echo "<br>";
if($promedio < 6){
    echo "El promedio es menor a 6";
}elseif($promedio == 6){
    echo "El promedio es igual a 6";
}else{
    echo "El promedio es mayor a 6";
}








?>