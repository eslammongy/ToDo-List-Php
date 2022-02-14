<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$db_name = "todos_list";

try{
    $pdoConnection = new PDO("mysql:host=$hostName;db_name=$db_name", $userName, $password);
    $pdoConnection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h1 style='text-align: center;color: orangered'>Connection Success</h1>";
}catch(PDOException $exception){
    echo "<h1 style='text-align: center;color: red'>Connection Field</h1>";
}
