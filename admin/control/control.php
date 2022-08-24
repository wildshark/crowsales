<?php
if(!file_exists("../config.json")){
    require("frame/500.php");
    exit;
}else{
    $conf = json_decode(file_get_contents("../config.json"),TRUE);
    $host = $conf['dbm']['host'];
    $username = $conf['dbm']['usr'];
    $password = $conf['dbm']['pwd'];
    $conn = new PDO("mysql:host=$host;dbname=salesbook", $username, $password);

    if(!$conn){
        require("frame/500.php");
        exit;  
    }
}
?>