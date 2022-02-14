<?php
include '../db_connection.php';
$pdoConn = new DbConnection();
$dbTodos = $pdoConn->openDbConnection();
if (isset($_POST['id'])){

    $id = $_POST['id'];
    if (empty($id)){
        echo "Error";
    }else{
        $todos = $dbTodos->prepare('SELECT id, checked FROM todos WHERE id=?');
        $todos->execute([$id]);
        $todo = $todos->fetch();
        $todoID = $todo['id'];
        $checked = $todo['checked'];
        $unChecked = $checked ? 0 : 1;
        $result = $dbTodos->query("UPDATE todos SET checked=$unChecked WHERE id=$todoID");

        if ($result){
            echo $checked;
        }else{
            echo "Error";
        }
        $pdoConn->closeConnection();
    }

}else{
    header("Location: ../index.php?mess=error");
}
