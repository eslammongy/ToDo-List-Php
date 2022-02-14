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
        <form action="app/addingTask.php" method="post" autocomplete="off">
            <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <label>
                    <input type="text" name="title" placeholder="please enter the todo title"
                           style="border-color: red"
                    />
                </label>
                <button type="submit" class="add-todo-btn">Add &nbsp; <span>&#43;</span></button>
            <?php }else{?>
            <label>
                <input type="text" name="title" placeholder="What do you need to do today?"
                />
            </label>
            <button type="submit" class="add-todo-btn">Add &nbsp; <span>&#43;</span></button>
            <?php } ?>
        </form>
    </div>
    <!-- start displays the todos list section-->
    <?php
    $pdoConnect = new DbConnection();
    $todos = $pdoConnect->openDbConnection()->query("SELECT * FROM todos ORDER BY id DESC ");

    ?>
    <div class="display-todos-section">
        <?php
        if ($todos->rowCount() <= 0) { ?>
            <div class="todo-item-curd">
                <div class="empty">
                    <img src="images/homework.png" alt="No Tasks Included Yet !!" width="40%">
                </div>
            </div>
            <?php
        } ?>
        <?php
        while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="todo-item-curd">
                <span id="<?php
                echo $todo['id'] ?>" class="remove-to-do">X</span>
                <?php
                if ($todo['checked']) { ?>
                    <label>
                        <input class="check-box" type="checkbox" checked>
                    </label>
                    <h2 class="checked"><?php
                        echo $todo['title'] ?></h2>
                <?php
                } else { ?>
                    <label>
                        <input class="check-box" type="checkbox">
                    </label>
                    <h2><?php
                        echo $todo['title'] ?></h2>
                <?php
                } ?>
                <br>
                <small>created: <?php
                    echo $todo['date_time'] ?></small>
            </div>
        <?php
        } ?>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function (){
     $('.remove-to-do').click(function (){
         const id = $(this).attr('id');
         alert(id)

        /* $.post("app/RemoveTodo.php");*/
     });
    });
</script>
</body>
</html>
