<?php



function esPar($numero){
    if(($numero % 2) == 0){
        return TRUE;
    }else {
        return FALSE;
    }

}

function esImpar($numero){
    return !esPar($numero);
}


$numero = $_POST['numero'];
echo "Es par: ".esPar($numero)."<br/>";
echo "Es impar: ".esImPar($numero);

?>