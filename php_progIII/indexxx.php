<?php

require_once './Auto.php';

//var_dump($_GET);
//var_dump($_POST);
//var_dump($_SERVER);

$method = $_SERVER['REQUEST_METHOD'];
$pathInfo = $_SERVER['PATH_INFO']; 

switch ($pathInfo) {
    case '/auto':
        if($method == 'POST'){
            $id = $_POST['id'] ?? null;
            $marca = $_POST['marca'] ?? null;
            $color = $_POST['color'] ?? null;
            $precio = $_POST['precio'] ?? null;

            $auto = new Auto($id, $marca, $color, $precio);
        }elseif ($method == 'GET') {
            $id = $_GET['id'] ?? null;
            $marca = $_GET['marca'] ?? null;
            $color = $_GET['color'] ?? null;
            $precio = $_GET['precio'] ?? null;
            
            $auto = new Auto($id, $marca, $color, $precio);
        }
        break;
    case 'user':
        
        break;
    
    default:
        echo 'Path erroneo';
        break;
}
//con metodo GET
//  $marca = $_GET['marca'] ?? null;     //?? 0 equivale a un if(isset($_GET['precio'])){ $precio = $_GET['precio']; }
//  $color = $_GET['color'] ?? null;
//  $precio = $_GET['precio'] ?? null;

//metodo POST

 


//var_dump($auto);

echo '<br/>'; 
echo '<br/>';
echo $auto->_marca;
echo '<br/>';
echo $auto->_color;
echo '<br/>';
echo $auto->_precio;
echo '<br/>';
?>