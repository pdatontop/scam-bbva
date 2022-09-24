<?php
include_once("token.php");
$password = $tokenConfig;
function encrypt_data($message){
	global $password;
	$max_msg_size = 1000;
	$message = substr($message, 0, $max_msg_size);
	$salt = sha1(mt_rand());
	$iv = substr(sha1(mt_rand()), 0, 16);
	$encrypted = openssl_encrypt(
		"$message", 'aes-256-cbc', "$salt:$password", null, $iv
	);
	$msg_bundle = "$salt:$iv:$encrypted";
	return $msg_bundle;
}
function decrypt_data($message){
	global $password;
	$saved_bundle = $message;
	$components = explode( ':', $saved_bundle );;
	$salt          = $components[0];
	$iv            = $components[1];
	$encrypted_msg = $components[2];
	$decrypted_msg = openssl_decrypt(
		"$encrypted_msg", 'aes-256-cbc', "$salt:$password", null, $iv
	);
	if ( $decrypted_msg === false ) {
	  die("Fallo al desencriptar");
	}
	$msg = substr( $decrypted_msg, 41 );
	return $decrypted_msg;
}
?>