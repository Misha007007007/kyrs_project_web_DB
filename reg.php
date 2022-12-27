<?php
require("connectdb.php");
require("session.php");

$role = 2;
if (!empty($_POST)){
    $result = mysqli_query($connect, "SELECT * FROM user WHERE login=\"".$_POST['login']."\"");
    //echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0){
        mysqli_query($connect, "INSERT user (login, password_hash, role) VALUES (
            \"".$_POST["login"]."\",
            \"".md5($_POST["password"])."\",
            \"".$role."\"
            )"
        );
        // header("Location: menu.php");
        echo "Вы зарегистрировали нового пользователя";
        header('Refresh: 2; lk.php');
    }
    else{
        echo "Невозможно зарегистировать пользователя с таким логином.";
        exit;
    }
    //$id = mysqli_insert_id($connect);
    
}
