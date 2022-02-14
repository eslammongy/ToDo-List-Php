<?php
include '../db_connection.php';
$pdoConn = new DbConnection();
$dbTodos = $pdoConn->openDbConnection();
if (isset($_POST['title'])){

    $title = $_POST['title'];
    if (empty($title)){
        header("Location: ../index.php?mess=error");
    }else{
        $insertTodo = $dbTodos->prepare("INSERT INTO todos(title) VALUE(?)");
        $result = $insertTodo->execute([$title]);

        if ($result){
            header("Location: ../index.php?mess=success");
        }else{
            header("Location: ../index.php");
        }
        $pdoConn->closeConnection();
    }
    echo "<h1>$title</h1>";
}else{
    header("Location: ../index.php?mess=error");
}
