<?php

require_once '/xampp/htdocs/php/Programacion-y-Laboratorio-III/php_progIII/Auto.php';

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
echo json_encode($listaDeAutos);

echo "<pre>";
//var_dump($listaDeAutos);
echo "</pre>";
echo "\nfclose $close";

?>