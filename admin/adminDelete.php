<?php session_start();
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php");
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
    if(!isset($_GET["id"])){
        header('Refresh: 2; https://andreitsev.ru/user/lk.php');
        echo '<h2>Не указан идентификатор записи.</h2>';
    }
    if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2){
        $stmt = $connect->prepare("DELETE FROM `addedPlaces` WHERE id = ?");
        $stmt->bind_param("i", $_GET['id']);
        $result = $stmt->execute();
        $stmt->close();
        header('Refresh: 2; https://andreitsev.ru/user/lk.php');
        echo '<h2>Запись удалена.</h2>';
    }
    else{
        header('Refresh: 2; https://andreitsev.ru/user/lk.php');
        echo '<h2>Вы не можете удалить данную запись.</h2>';
    }
    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php");
?>


