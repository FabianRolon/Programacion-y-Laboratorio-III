<?php
echo "Usando for <br/>";
for ($i=0; $i < 10; $i++) { 
    $vec[$i] = (2*$i)+1;
    echo $vec[$i]."<br/>";
}
echo "Usando foreach <br/>";
foreach ($vec as $key => $value) {
    echo $value."<br/>";
}
echo "Usando while <br/>";
$j = 0;
while ($j < 10) {
    echo $vec[$j]. "<br/>";
    $j++;
}
?>