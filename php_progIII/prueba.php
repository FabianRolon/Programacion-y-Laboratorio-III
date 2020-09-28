<?php

require_once './Auto.php';


$arrayAutos = array();

$auto1 = new Auto("1","VolksWagen","Gris","150000");
$auto2 = new Auto("2","Fiat","Blanco","130000");
$auto3 = new Auto("3","Ford","Rojo","140000");
$auto4 = new Auto("4","Toyota","Negro","190000");

array_push($arrayAutos, $auto1);
array_push($arrayAutos, $auto2);
array_push($arrayAutos, $auto3);
array_push($arrayAutos, $auto4);

echo "<pre>";
echo json_encode($arrayAutos);
echo "</pre>";