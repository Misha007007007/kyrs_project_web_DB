<?php
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php");

    if ($_POST['login'] != null &&  $_POST['password'] != null){
        $stmt = $connect->prepare("SELECT * FROM user WHERE login = ?");
        $stmt->bind_param("s", $_POST["login"]);
        $result = $stmt->execute();
        $result = mysqli_stmt_get_result($stmt);
        $stmt->close();
        if(mysqli_num_rows($result) == 0){
            if ($_GET['type'] == 2) $role = 2;
            else $role = 3;
            $pass = md5($_POST["password"]);
            $stmt = $connect->prepare("INSERT user (login, password_hash, role) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $_POST["login"], $pass, $role);
            $result = $stmt->execute();
            $result = mysqli_stmt_get_result($stmt);
            $stmt->close();
            if ($_GET['type'] == 2){
                header('Refresh: 3; https://andreitsev.ru/user/lk.php');
                echo '<h2>Вы зарегистрировали нового пользователя.</h2>'; 
            } 
            else {
                header('Refresh: 3; https://andreitsev.ru/index.php');
                echo '<h2>Вы зарегистрированы</h2>';
            }
        }
        else{
            if ($_GET['type'] == 2){
                header('Refresh: 3; https://andreitsev.ru/user/regUser.php');
                echo '<h2>Невозможно зарегистировать пользователя с таким логином</h2>'; 
            } 
            else {
                header('Refresh: 3; https://andreitsev.ru/user/regUser.php?type=3');
                echo '>Невозможно зарегистировать пользователя с таким логином</h2>';
            }
        }
    }
    else {
        if ($_GET['type'] == 2){
            header('Refresh: 3; https://andreitsev.ru/user/regUser.php');
            echo '<h2>Заполните все поля.</h2>';
        } 
        else {
            header('Refresh: 3; https://andreitsev.ru/user/regUser.php?type=3');
            echo '<h2>Заполните все поля.</h2>';
        }
    }
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php");
    ?>
