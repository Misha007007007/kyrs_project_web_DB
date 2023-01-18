<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
            </ul>
        </div>
    </div>
</header>
<section id = "about" class="about">
    <div class="container">
        <?php
        
        require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
        require("C:/localhost/front/kyrs_project_web/layoutFiles/session.php");
        $examination = 2;
        // echo count($_POST);
        if($_POST['user_name'] == null || $_POST['name'] == null || $_POST['admArea'] == null || $_POST['district'] == null || $_POST['address'] == null || $_POST['comment'] == null){
            echo "<h2>Невозможно добавить данное место. Вы заполнили не все поля.</h2>";
            header('Refresh: 2; http://localhost:3000/comments/create.php');
            
        }
        else{
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
                echo "<h2>Введенные Вами данные отправлены администратору. После проверки они поступят в базу данных</h2>";
                header('Refresh: 4; http://localhost:3000/index.php');
            }
            else{
                echo "<h2>Невозможно добавить данное место. Возможно, оно уже есть в нашей базе данных.</h2>";
                header('Refresh: 4; http://localhost:3000/comments/create.php');
            }
        }
        
        ?>
    </div>
</section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>
