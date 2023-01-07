<?php
    // echo $_POST['name'];
    // echo count($_POST);

    require("connectdb.php");
    require("session.php");
    $examination = 1;
    

    if($_POST['user_name'] == "" || $_POST['name'] == "" || $_POST['admArea'] == "" || $_POST['district'] == null || $_POST['address'] == null || $_POST['comment'] == null){
        echo "Невозможно добавить данное место. Заполнены не все поля.";
        header('Refresh: 25; lk.php');
    }
    else{
        if($session_user["role"] == 1 || $session_user["role"] == 2){
            $stmt = $connect->prepare("UPDATE `addedPlaces` SET user_name = ?, name = ?, admArea = ?, district = ?, address = ?, comment = ?, examination = ? WHERE id = ?");
            $stmt->bind_param("ssssssii", $_POST['user_name'], $_POST['name'], $_POST['admArea'], $_POST['district'], $_POST['address'], $_POST['comment'], $examination, $_GET['id']);
            $result = $stmt->execute();
            echo "Запись добавлена";
            header('Refresh: 25; lk.php');
        }
        else{
            echo "Вы не можете добавить данную запись.";
            header('Refresh: 25; lk.php');
        }
    }
?>