<?php
    session_start();
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php");

    $stmt = $connect->prepare("SELECT * FROM `user` WHERE `login`= ? AND `password_hash` = ?");
    $pass = md5($_POST["password"]);
    $stmt->bind_param("ss", $_POST["login"], $pass);
    $result = $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    $stmt->close();
    $userData = mysqli_fetch_assoc($result);
    if(!$result || mysqli_num_rows($result) == 0){
        header('Refresh:2; https://andreitsev.ru/user/authorization.php');
        echo '<h2>Такой пользователь не существует или введены неверные данные..</h2>';
    }else{
        $_SESSION["user"] = mysqli_fetch_assoc($result);
        $session_user = (isset($_SESSION["user"])) ? $_SESSION["user"] : false;
        $_SESSION['login'] = $userData['login'];
        $_SESSION["pass"] = $userData['password_hash'];
        $_SESSION["role"] = $userData['role'];
        header("Location: https://andreitsev.ru/index.php");
    }
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php");
?>