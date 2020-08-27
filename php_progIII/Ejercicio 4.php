<?php

$operador;
$op1;
$op2;

function calcular($op1, $op2, $operador){
    switch ($operador){
        case "+":
            return $op1 + $op2;
        case "-":
            return $op1 - $op2;
        case "*":
            return $op1 * $op2;
        case "/":
            if ($op2 != 0) {
                return $op1 + $op2;
            }
            return "Error, la division por cero no existe";
        default:
            return "La operacion indicada no es correcta";
    }        
}

echo calcular(1,2,"+");
echo "<br>";
echo calcular(4,2,"-");
echo "<br>";
echo calcular(5,4,"*");
echo "<br>";
echo calcular(1,2,"r");
echo "<br>";
echo calcular(27,3,"/");
echo "<br>";
echo calcular(2,0,"/");
echo "<br>";

?>