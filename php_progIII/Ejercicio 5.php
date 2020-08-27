<?php

$conversion = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
$n = 1055455;
$izquierda = intval(floor($n));
$derecha = intval(($n - floor($n)) * 100);
echo $conversion->format($izquierda) . " coma " . $conversion->format($derecha);


?>