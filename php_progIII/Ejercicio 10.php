<?php

function ArrayLapicera(){
    return array("color"=> '',"marca"=> '',"trazo"=> '',"precio"=> '');
}
$lapicera1 = ArrayLapicera();
    $lapicera1["color"] = "Azul";
    $lapicera1["marca"] = "Bic";
    $lapicera1["trazo"] = "2.0";
    $lapicera1["precio"] = "15$";

    
    $lapicera2 = ArrayLapicera();
    $lapicera2["color"] = "Rojo";
    $lapicera2["marca"] = "Parker";
    $lapicera2["trazo"] = "1.0";
    $lapicera2["precio"] = "50$";


    $lapicera3 = ArrayLapicera();
    $lapicera3["color"] = "Verde";
    $lapicera3["marca"] = "Pizzini";
    $lapicera3["trazo"] = "1.5";
    $lapicera3["precio"] = "40$";

function MostrarLapicera($lapicera){
    echo "Lapicera: <br/>";
    foreach ($lapicera as $key => $value) {
        echo $key.": ".$value."<br/>";
    }
    echo "<br/>";
}

$arrayLapiceras = array($lapicera1, $lapicera2, $lapicera3);

foreach ($arrayLapiceras as $value) {
    MostrarLapicera($value);
}

?>