<?php

require 'db_connection.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1 style="text-align: center;color: orangered;">What are you doing?</h1>
<!-- start adding new todos section-->
<div class="main-section">
    <div class="adding-todo-section">
        <form action="">
            <label>
                <input type="text" name="title" placeholder="please enter the todo title"
                />
            </label>
            <button type="submit" class="add-todo-btn">Add &nbsp; <span>&#43;</span></button>
        </form>
    </div>
</div>
<!-- start displays the todos list section-->
<?php
$todos = new DbConnection();
$db = $todos->openDbConnection();

?>
<div class="display-todos-section">
    <div class="todo-item-curd">
        <label>
            <input type="checkbox">
        </label>
        <h2>This is the first task today</h2>
        <br>
        <small>created: 3/8/2022</small>
    </div>
</div>

</body>
</html>
