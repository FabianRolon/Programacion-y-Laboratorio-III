<?php

$operador= $_POST['operador'];
$op1= $_POST['op1'];
$op2= $_POST['op2'];

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
                return $op1 / $op2;
            }
            return "Error, la division por cero no existe";
        default:
            return "La operacion indicada no es correcta";
    }        
}
echo "<br>";
echo "El resultado es ". calcular($op1,$op2,$operador);


?>