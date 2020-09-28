<?php

require_once '/xampp/htdocs/Programacion-y-Laboratorio-III/php_progIII/Auto.php';
require_once '/xampp/htdocs/Programacion-y-Laboratorio-III/php_progIII/ManejadorArchivos.php';

//$auto = new Auto('Volkswagen', 'Gris', rand(100000, 1000000));

$filename = 'autos.txt';
$size = filesize($filename);
$modo = 'r';

$archivo = fopen($filename, $modo);
//echo filesize($filename)." filesize <br>";
//echo fread($archivo, $size);

//$fwrite = fwrite($archivo, $auto. PHP_EOL);
// $fwrite = fwrite($archivo, 'fwrite2'. PHP_EOL);
// $fwrite = fwrite($archivo, 'fwrite3 '. PHP_EOL);

$listaDeAutos = array();
 
while (!feof($archivo)) {
   $linea = fgets($archivo);
   $datos = explode('*',$linea);//separa por el caracter que especificamos, devuelve un array 
   echo'>'.$linea. "<br>";
   if(count($datos) > 3){
      $autoNuevo = new Auto($datos[0], $datos[1], $datos[2], $datos[3]);   
      array_push($listaDeAutos,$autoNuevo);
   }
   
}

$close = fclose($archivo);
<<<<<<< HEAD
$stringJson = json_encode($listaDeAutos);
echo json_encode($listaDeAutos);
$deco = (array)json_decode($stringJson);
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
var_dump($deco);

=======
$listaAutosJson = json_encode($listaDeAutos);
echo "Se codifica en JSON: ". $listaAutosJson;
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<pre>";
$listaAutosDecodificada = json_decode($listaAutosJson);
echo "</pre>";
var_dump($listaAutosDecodificada);

$arrayDeAutos = array();
foreach ($listaAutosDecodificada as $value) {
   $instanciaAuto = new Auto($value->_id, $value->_patente, $value->_color, $value->_precio, $value->_marca, $value->_fecha);
   array_push($arrayDeAutos, $instanciaAuto);
}
>>>>>>> 56a8bc62cd6f8e41ec6a65a7d9f70c903933cd9e

echo "<pre>";
var_dump($arrayDeAutos);
echo "</pre>";
echo "\nfclose $close";

?>