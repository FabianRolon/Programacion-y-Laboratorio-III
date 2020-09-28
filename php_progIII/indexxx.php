<?php

require_once './Auto.php';
require './vendor/autoload.php';

//var_dump($_GET);
//var_dump($_POST);
//var_dump($_SERVER);
use \Firebase\JWT\JWT;

$key = "example_key";
$payload = array(
    "iss" => "http://example.org",
    "aud" => "http://example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000,
    "email" => "nombre@gmail.com",
    "type" => "admin"
);

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
$jwt = JWT::encode($payload, $key);
$token = $_SERVER['HTTP_TOKEN']; //get_headers("");

try {
    $decoded = JWT::decode($token, $key, array('HS256')); 
} catch (\Throwable $th) {
    echo "Error";
}


print_r($decoded);  

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