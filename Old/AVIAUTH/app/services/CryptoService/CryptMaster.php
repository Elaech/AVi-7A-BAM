<?php
//Done by Minut Mihai Dimitrie
//PROVIDES 2048bits RSA encryption and decryption
class CryptMaster
{
    //THE PRIVATE KEY AND INIT VECTOR SHOULD NEVER LEAVE THE AUTHENTICATION API
    //THEY ARE USED TO DECRYPT DATA
    private static $PRIVATE_KEY;
    private static $INIT_VECTOR;
    public function __construct()
    {
        CryptMaster::$PRIVATE_KEY = file_get_contents('../app/resources/privatekey.txt');
        CryptMaster::$INIT_VECTOR = file_get_contents('../app/resources/initialvector.txt');
    }

    public static function master_encrypt($string = "")
    {
        $cryptotext = openssl_encrypt($string, 'aes-256-cbc', CryptMaster::$PRIVATE_KEY, 0,CryptMaster::$INIT_VECTOR);
        return $cryptotext;
    }
    public static function master_decrypt($cryptotext)
    {
        return  openssl_decrypt($cryptotext, 'aes-256-cbc', CryptMaster::$PRIVATE_KEY, 0, CryptMaster::$INIT_VECTOR);
    }
	
    private function __clone() {}
	private function __wakeup() {}
}
