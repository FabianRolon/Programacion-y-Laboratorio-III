<?php

require_once './response.php';
require_once 'usuario.php';




$request_method=$_SERVER['REQUEST_METHOD'];
$path_info=$_SERVER['PATH_INFO']??'';	
$response = new Response();

switch ($path_info) {
    case '/registro':                                            
        switch ($request_method) {
            case 'POST':
                $email=$_POST['email']??'';
                $password=$_POST['password']??'';
                $tipo=$_POST['tipo']??'';

                if($email=='' || $password=='' || $tipo==''){
                    $response->status='fallo';
                    $response->data='Faltan datos'; 
                }else {
                    $usr = new Usuario($email, $password, $tipo);
                    $resultado = $usr->Registrar();
                    if($resultado){
                        $response->status='Completado';   
                        $response->data='Usuario creado'; 

                    }else {
                        $response->data='El usuario ya existe'; 
                        $response->status='error';                          
                    }
                }
            break;
            case 'GET':
                $response->data ="405 metodo no permitido";
                $response->status='fallo';
            break;
            default:
                $response->data ="405 metodo no permitido";
                $response->status='fallo';   
        }
    break;
    case '/login':                                                  
        switch ($request_method) {
            case 'POST':
                $email=$_POST['email']??'';
                $password=$_POST['password']??'';

                if($email == '' || $password == ''){
                    $response->status='fallo';
                    $response->data='Faltan datos'; 
                }else {
                    $jwt = Usuario::login($email, $password);     
                    if($jwt){
                        $response->status='Completado';   
                        $response->data=$jwt;                 
                     }else{
                        $response->data="Credenciales incorrectas"; 
                        $response->status='fallo'; 
                    }
                }
            break;
            case 'GET':
                $response->data ="405 metodo no permitido";
                $response->status='fallo';
            break;
            default:
                $response->data ="405 metodo no permitido";
                $response->status='fallo';   
        }
    break;
    case '/precio':
        $precio_hora = $_POST['precio_hora']??'';
        $precio_estadia = $_POST['precio_estadia']??'';
        $precio_mensual = $_POST['precio_mensual']??'';
        

    break;
    default:
        $response->data ="404 no encontrado";
        $response->status='fallo';
}
echo json_encode($response);