<?php

echo "Hola mundo";
echo "<br>";
// Día del mes con 2 dígitos, y con ceros iniciales, de 01 a 31
echo date("d");
echo "<br>";
// Día del mes, sin ceros iniciales, de 1 a 31
echo date("j");
echo "<br>";
// Día de la semana en inglés, con 3 letras, de Mon a Sun
echo date("D");
echo "<br>";
// Día de la semana en inglés, de Sunday a Saturday
echo date("l");
echo "<br>";
// del día de la semana, desde 1 (lunes) hasta 7 (domingo)
echo date("N");
echo "<br>";
// Sufijo del día del mes con 2 caracteres --> st, nd, rd o th
echo date("S");
echo "<br>";
// Número entero que representa el día de la semana, de 0 (dom) a 6 (sab)
echo date("w");
echo "<br>";
// Día del año, de 0 a 365
echo date("z");
echo "<br>";
echo "<br>";
echo "<br>";

$dia = date("j");
$mesIngles = date("F");
$mesNumerico = date("n");
$año = date("Y");

echo "Hoy es $dia de $mesIngles de $año";
echo "<br>";

//date("n") -> Dia del mes actual con formato del 1 al 12
if ((date("n") == 12 && date("j") > 20) || (date("n") == 3) && date("j")< 21 || (date("n") == 1) || (date("n") == 2)) {
    echo "Estamos en Verano";
}elseif ((date("n") == 3 && date("j") > 20) || (date("n") == 6) && date("j")< 21 || (date("n") == 4) || (date("n") == 5)) {
    echo "Estamos en Otoño";
}elseif ((date("n") == 6 && date("j") > 20) || (date("n") == 9) && date("j")< 21 || (date("n") == 7) || (date("n") == 8)) {
    echo "Estamos en Invierno";
}else{
    echo "Estamos en Primavera";
}


?>