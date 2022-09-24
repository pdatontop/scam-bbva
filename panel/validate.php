<?php
error_reporting(0);
include_once("token.php");
session_start();
if (array_key_exists('HTTP_X_REAL_IP', $_SERVER)){
	$ip = $_SERVER["HTTP_X_REAL_IP"];
}
else {
	$ip = getenv("REMOTE_ADDR");
}
$file_name = 'blocked/'.$ip.'.db';
$read_data = fopen($file_name, "r");
if($read_data){
	$data = fgets($read_data);
	if($data == 0){
		echo "Acceso bloqueado. Ciao, ciao.";
		exit();
	}
	if(isset($_POST['token'])){
	$token=$_POST['token'];
	if($token == $tokenConfig){
		$_SESSION['login']="y";
		echo "success";
	}
	else{
		$data = intval($data)-1;
		$write_data = fopen($file_name, "w+");
		fwrite($write_data, strval($data));
		fclose($write_data);
		fclose($read_data);
		if($data == 2){
			echo "Contraseña incorrecta. Te queda(n) 2 intento(s)";
		}
		else if($data == 1){
			echo "Contraseña incorrecta. Te queda(n) 1 intento(s)";
		}
		else if($data == 0){
			echo "Acceso bloqueado. Te queda(n) 0 intento(s)";
		}
	}
	exit();
	}
}
else {
	if(isset($_POST['token'])){
	$token=$_POST['token'];
	if($token == $tokenConfig){
		$_SESSION['login']="y";
		echo "success";
	}
	else{
		$write_data = fopen($file_name, "w+");
		fwrite($write_data, "3");
		fclose($write_data);
		fclose($read_data);
		echo "Contraseña incorrecta. Te queda(n) 3 intento(s)";
	}
	exit();
	}
}
?>