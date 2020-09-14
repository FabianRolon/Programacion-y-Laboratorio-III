<?php
require_once('Rectangulo.php');
require_once('Triangulo.php');

$cuadrado = new Rectangulo(51,21);
$cuadrado->SetColor("red");
$cuadrado->Dibujar();

$triangulo = new Triangulo(12,32);
$triangulo->SetColor("blue");
$triangulo->Dibujar();

?>