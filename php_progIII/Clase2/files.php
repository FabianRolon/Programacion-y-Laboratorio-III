<?php

$filename = 'archivo.txt';
$archivo = fopen($filename, 'a+');
echo filesize($filename)." filesize <br>";
//echo fread($archivo, $size);

$fwrite = fwrite($archivo, 'fwrite1'. PHP_EOL);
$fwrite = fwrite($archivo, 'fwrite2'. PHP_EOL);
$fwrite = fwrite($archivo, 'fwrite3 '. PHP_EOL);


while (!feof($archivo)) {
   echo fgets($archivo). "<br>";
}

$close = fclose($archivo);

echo "\nfclose $close";

echo "Probando la impresion dew un string, esto se esta grabando";


?>