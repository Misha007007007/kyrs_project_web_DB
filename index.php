<?php
session_start();
require("layoutFiles/header.php");
require("layoutFiles/connectdb.php");
    if (!$_SESSION){
        echo '<li><a href="https://andreitsev.ru/user/authorization.php">Личный кабинет</a></li>';
    }
    else if ($_SESSION["role"] == 1 || $_SESSION['role'] == 2){
        echo '<li><a href="https://andreitsev.ru/user/lk.php">Личный кабинет админа</a></li> <li><a href="https://andreitsev.ru/user/exit.php">Выход</a></li>';  
    } 
    else if ($_SESSION["role"] == 3){
        echo '<li><a href="https://andreitsev.ru/user/exit.php">Выход</a></li>';
    }else{
        echo '<li><a href="https://andreitsev.ru/user/authorization.php">Личный кабинет</a></li>';
    }
?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <h3> В приложении используются <a href='https://data.mos.ru/opendata/7708308010-ledovye-polya-krytye'>открытые данные (Портал открытых данных Правительства Москвы). </a></h3>
            <h3> Привет, здесь собрано большинство мест Москвы, где ты можешь покататься на коньках и отдохнуть.</h3>
            <?php
                $stmt = $connect->prepare("SELECT COUNT(`id`) FROM field");
                $resultCountField = $stmt->execute();
                $resultCountField = mysqli_stmt_get_result($stmt);

                $stmt = $connect->prepare("SELECT COUNT(`id`) FROM addedPlaces WHERE examination = 1");
                $resultCountAddedPlaces = $stmt->execute();
                $resultCountAddedPlaces = mysqli_stmt_get_result($stmt);

                $stmt->close();

                $countField = mysqli_fetch_assoc($resultCountField);
                $countAddedPlaces = mysqli_fetch_assoc($resultCountAddedPlaces);
                $count = $countField['COUNT(`id`)'] + $countAddedPlaces['COUNT(`id`)'];
            ?>
            <h3> Мы уже собрали множество ледовых полей, а именно: <?php echo $count?> . Из них <?php echo $countAddedPlaces['COUNT(`id`)']?> добавили наши пользователи </h3>
            <h3> Выберите один их понравившихся Вам пунктов: </h3>
            
            <div class = "functionList">
                <a href="https://andreitsev.ru/information/allInformation.php">Просмотр информации о ледовых полях</a>
                <br>
            </div>
            <div class = "functionList">
                <a href="https://andreitsev.ru/selectionByDistrict/formDistrict.php">Подобрать в своем районе</a>
                <br>
            </div>
            <div class = "functionList">
                <a href="https://andreitsev.ru/selectionByAdmArea/formAdmArea.php">Подобрать в административном округе</a>
                <br>
            </div>
            <div class = "functionList">
                <a href="https://andreitsev.ru/interview/interviewOne.php">Опрос для подбора ледового поля</a>
                <br>
            </div>
            <div class = "functionList">
                <?php
                if (!$_SESSION["role"]) echo '';
                else echo '<a href="https://andreitsev.ru/comments/create.php">Добавить запись</a><br>';
                ?>
            </div>
        </div>
    </section>
<?php require("layoutFiles/footer.php") ?>
