<?php
    require("connectdb.php");
    require("session.php");
    
    if(!isset($_GET["id"])){
        echo "Не указан идентификатор записи.";
        exit;
    }
    if ($session_user["role"] == 1 || $session_user["role"] == 2){
        $stmt = $connect->prepare("DELETE FROM `addedPlaces` WHERE id = ?");
        $stmt->bind_param("i", $_GET['id']);
        $result = $stmt->execute();
        $stmt->close();
        echo "Запись удалена";
        header('Refresh: 2; lk.php');
    }
    else{
        echo "Вы не можете удалить данную запись";
        header('Refresh: 2; lk.php');
    }

?>

