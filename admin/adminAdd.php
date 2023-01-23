<?php session_start();
require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php");
require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
            $examination = 1;
            if($_POST['user_name'] == "" || $_POST['name'] == "" || $_POST['admArea'] == "" || $_POST['district'] == null || $_POST['address'] == null || $_POST['comment'] == null){
                header('Refresh: 2; https://andreitsev.ru/user/lk.php');
                echo '<h2>Невозможно добавить данное место. Заполнены не все поля.</h2>';
            }
            else{
                if($_SESSION["role"] == 1 || $_SESSION["role"] == 2){
                    $stmt = $connect->prepare("UPDATE `addedPlaces` SET user_name = ?, name = ?, admArea = ?, district = ?, address = ?, comment = ?, examination = ? WHERE id = ?");
                    $stmt->bind_param("ssssssii", $_POST['user_name'], $_POST['name'], $_POST['admArea'], $_POST['district'], $_POST['address'], $_POST['comment'], $examination, $_GET['id']);
                    $result = $stmt->execute();
                    header('Refresh: 2; https://andreitsev.ru/user/lk.php');
                    echo '<h2>Задись добавлена.</h2>';
                }
                else{
                    header('Refresh: 2; https://andreitsev.ru/user/lk.php');
                    echo '<h2>Вы не можете добавить данную запись.</h2>';
                }
            }
            require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php");
        ?>