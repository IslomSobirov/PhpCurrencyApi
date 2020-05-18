<?php 
use \Firebase\JWT\JWT;
class User extends Model {


    public function getToken()
    {
        $key = "example_key";
        $iss = "http://example.org";
        $aud = "http://example.com";
        $iat = 1356999524;
        $nbf = 1357000000;

        $token = array(
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "id" => 1,
           "firstname" => "Adadade",
           "lastname" => "ereaarea",
           "email" => "rararad"
            )
        );

        $jwt = JWT::encode($token, $key);

        return $jwt;
    }


    public function verifyToken($jwt)
    {
        $key = "example_key";
        $iss = "http://example.org";
        $aud = "http://example.com";
        $iat = 1356999524;
        $nbf = 1357000000;
        try{
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            return true;

        } catch(Exception $e) {
            return false;
        }
    }
}