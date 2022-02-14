<?php
include '../db_connection.php';
$pdoConn = new DbConnection();
$dbTodos = $pdoConn->openDbConnection();
if (isset($_POST['id'])){

    $id = $_POST['id'];
    if (empty($id)){
        echo 0;
    }else{
        $deleteTodo = $dbTodos->prepare("DELETE FROM todos WHERE id=?");
        $result = $deleteTodo->execute([$id]);

        if ($result){
           echo 1;
        }else{
           echo 0;
        }
        $pdoConn->closeConnection();
    }

}else{
    header("Location: ../index.php?mess=error");
}
