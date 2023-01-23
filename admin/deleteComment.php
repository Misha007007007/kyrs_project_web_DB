<?php session_start();
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php");
    if(!isset($_GET["id"])){
        header('Refresh: 2; https://andreitsev.ru/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
        echo '<h2>Не указан идентификатор комментария.</h2>';
    }
    if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2){
        $stmt = $connect->prepare("DELETE FROM `comments` WHERE id = ?");
        $stmt->bind_param("i", $_GET['id']);
        $result = $stmt->execute();
        $stmt->close();
        header('Refresh: 2; https://andreitsev.ru/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
        echo '<h2>Комментарий удален.</h2>';

    }
    else{
        header('Refresh: 2; https://andreitsev.ru/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
        echo '<h2>Вы не можете удалить данный комментарий.</h2>';

    }
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php");
?>
