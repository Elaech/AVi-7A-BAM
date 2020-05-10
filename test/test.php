<?php

// if (isset($_SERVER['HTTPS']) )
// {
//     echo "SECURE: This page is being accessed through a secure connection.<br><br>";
// }
// else
// {
//     echo "UNSECURE: This page is being access through an unsecure connection.<br><br>";
// }

// // Create the keypair
// $res=openssl_pkey_new(array('private_key_bits' => 2048));

// // Get private key
// openssl_pkey_export($res, $privatekey);

// // Get public key
// $publickey=openssl_pkey_get_details($res);
// $publickey=$publickey["key"];

// echo "Private Key:<BR>$privatekey<br><br>Public Key:<BR>$publickey<BR><BR>";
// file_put_contents ( "privatekey.txt" , $privatekey );
// file_put_contents ( "publickey.txt" , $publickey );
// $cleartext = '1234 5678 9012 3456';

// echo "Clear text:<br>$cleartext<BR><BR>";

// openssl_public_encrypt($cleartext, $crypttext, $publickey);

// echo "Crypt text:<br>$crypttext<BR><BR>";

// openssl_private_decrypt($crypttext, $decrypted, $privatekey);

// echo "Decrypted text:<BR>$decrypted<br><br>";
$data = "ABC";
$encryption_key = openssl_random_pseudo_bytes(32);
file_put_contents ( "privatekey.txt" , $encryption_key);
// Generate an "initialization vector" (This too needs storing for decryption but we can append it to the encrypted data)
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
file_put_contents ( "initialvector.txt" , $iv);
echo $iv . "<br>";
// encrypt data using openssl_encrypt()
$encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0,$iv);
// the $options can be set to 0 for default options or changed to OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING
// append the initialisation vector to the encrypted data
echo $encrypted. "<br>";
$encrypted = $encrypted . ':' . $iv;
// retrieve the encrypted data and the initialization vector.
$parts = explode(':' , $encrypted);
// decrypt data using openssl_decrypt()
$decrypted = openssl_decrypt($parts[0], 'aes-256-cbc', $encryption_key, 0, $iv);
echo $decrypted. "<br>";
?>