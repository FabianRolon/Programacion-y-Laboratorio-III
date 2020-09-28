<?php

require_once('vendor/autoload.php');
use \Firebase\JWT\JWT;

class Auth{
    private static $key= 'primerparcial';

    public static function crearJWT($payload){
        return JWT::encode($payload, self::$key);
    }

    public static function generarPayload($user_data =''){
        $payload = array(
            "iss" => "localhost",
            "sub" => "",
            "aud" => "users",
            "iat" => time(),
            "nbf" => time() + 1,
            "exp" => time() + 600, //10 min
            "data" => $user_data
        );
        return $payload;
    }

    public static function autentificar($jwt){
        try {
            return JWT::decode($jwt, self::$key, array('HS256'));
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}