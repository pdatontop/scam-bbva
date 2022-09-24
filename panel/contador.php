<?php
if (array_key_exists('HTTP_X_REAL_IP', $_SERVER)){
	$visitor = $_SERVER["HTTP_X_REAL_IP"];
}
else {
	$visitor = getenv("REMOTE_ADDR");
}

if(!(file_exists("panel/contador/".$visitor.".db"))){
	$addvisitor = fopen("panel/contador/".$visitor.".db", "w+");
	fclose($addvisitor);
}
?>