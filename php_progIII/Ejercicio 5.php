<?php

$conversion = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
$numero = $_POST['numero'];
$izquierda = intval(floor($numero));
$derecha = intval(($numero - floor($numero)) * 100);
echo $conversion->format($izquierda) . " coma " . $conversion->format($derecha);


?>