<?php

function DbConnect(){


$servername = "localhost";
$username = "root";
$password = "";

$idcompte = 0;

try{
    $link = new PDO("mysql:host=$servername; dbname=app-g7d", $username, $password);
    $link ->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
    return $link;
    }

catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
}

?>