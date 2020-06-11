<?php
//Done by Minut Mihai Dimitrie
require '../app/vendor/autoload.php';
use \Firebase\JWT\JWT;

class UserToken {
    private static $TOKEN_KEY;
    public function __construct()
    {
        UserToken::$TOKEN_KEY = file_get_contents('../app/resources/tokenkey.txt');
    }
    public static function encode_payload($payload){
        return JWT::encode($payload,UserToken::$TOKEN_KEY,'HS256');
    }
    public static function decode_payload($payload){
        return JWT::decode($payload,UserToken::$TOKEN_KEY,array('HS256'));
    }
}