<?php require("layoutFiles/header.php") ?>

                    <?php 
                        require("layoutFiles/session.php");
                        require("layoutFiles/connectdb.php");
                        if (!$session_user){
                             echo '<li><a href="http://localhost:3000/user/authorization.php">Личный кабинет</a></li>';
                        }
                        else{
                            if ($session_user['role'] == 3) echo '<li><a href="#">Пользователь: '.$session_user['login'].'</a></li> <li><a href="http://localhost:3000/user/exit.php">Выход</a></li>';
                            else echo '<li><a href="http://localhost:3000/user/lk.php">Личный кабинет администратора</a></li> <li><a href="http://localhost:3000/user/exit.php">Выход</a></li>';
                        }
                    ?>  
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            
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
                
                // echo $session_user['role'];
                // echo $session_user['login'];

            ?>
            <h3> Мы уже собрали множество ледовых полей, а именно: <?php echo $count?> . Из них <?php echo $countAddedPlaces['COUNT(`id`)']?> добавили наши пользователи </h3>
            <h3> Выбери один их понравившихся тебе пунктов: </h3>
            </h3>
            <p><ul class = "functionList">
                <li>
                    <a href="http://localhost:3000/information/allInformation.php">Просмотр информации о ледовых полях</a>
                </li>
                <br>
                <li>
                    <a href="http://localhost:3000/selectionByDistrict/formDistrict.php">Подобрать в своем районе</a>
                </li>
                <br>
                <li>
                    <a href="http://localhost:3000/selectionByAdmArea/formAdmArea.php">Подобрать в административном округе</a>
                </li>
                <br>
                <li>
                    <a href="http://localhost:3000/interview/interviewOne.php">Опрос для подбора ледового поля</a>
                </li>
                <br>
                <?php
                if (!$session_user) echo '';
                else echo '<li><a href="http://localhost:3000/comments/create.php">Добавить запись</a></li><br>';
                ?>
            </ul></p>
            
        </div>
    </section>
    <?php require("layoutFiles/footer.php") ?>
