<?php
    error_reporting(0);
    session_start();
    if($_SESSION["login"] == "y"){
        include_once("token.php");
        if (array_key_exists('HTTP_X_REAL_IP', $_SERVER)){
            $ip = $_SERVER["HTTP_X_REAL_IP"];
        }
        else {
            $ip = getenv("REMOTE_ADDR");
        }
        $file_name = 'blocked/'.$ip.'.db';
        if(file_exists($file_name)){
            $read_data = fopen($file_name, "r");
            if($read_data){
                $data = fgets($read_data);
                if($data == 0){
                    echo "blocked";
                    exit();
                }
                else if($tokenConfig == $_POST["actpass"]){
                    $newpass = fopen("token.php", "w+");
                    fwrite($newpass, '<?php
        $tokenConfig = "'.$_POST["newpass"].'";
        ?>');
                    fclose($newpass);
                    echo "success";
                }
                else {
                    echo "error";
                }
            }
        }
        else {
            if($tokenConfig == $_POST["actpass"]){
                $newpass = fopen("token.php", "w+");
                fwrite($newpass, '<?php
$tokenConfig = "'.$_POST["newpass"].'";
?>');
                fclose($newpass);
                echo "success";
            }
            else {
                echo "error";
            }
        }
    }
    ?>