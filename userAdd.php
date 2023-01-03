<?php
require("connectdb.php");
require("session.php");
$examination = 2;
echo count($_POST);
if(count($_POST) == 6){
    $stmt = $connect->prepare("SELECT * FROM `addedPlaces` WHERE `admArea` = ? AND `district` = ? AND `address` = ?");
    $stmt->bind_param("sss", $_POST['admArea'], $_POST['district'], $_POST['address']);

    $result = $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    $stmt->close();

    $row = mysqli_fetch_row($result);
    if($row == 0){
        $stmt = $connect->prepare("INSERT INTO `addedPlaces` (user_name, name, admArea, district, address, comment, examination) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $_POST['user_name'], $_POST['name'], $_POST['admArea'], $_POST['district'], $_POST['address'], $_POST['comment'], $examination);
        $result = $stmt->execute();
        echo "Введенные Вами данные отправлены администратору. После проверки они поступят в базу данных";
        header('Refresh: 2; index.php');
    }
    else{
        echo "Невозможно добавить данное место. Возможно, она уже есть в нашей базе данных или вы заполнили не все поля.";
        header('Refresh: 2; create.php');
    }
}
?>
