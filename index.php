<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>

                    <li>
                        <a href="authorization.php">
                            Личный кабинет
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
<!-- 
    SELECT district
    FROM `field`
GROUP BY district
ORDER BY count(*) DESC
   LIMIT 3; -->
    <section id = "about" class="about">
        <div class="container">
            
            <h3> Привет, здесь собрано большинство мест Москвы, где ты можешь покататься на коньках и отдохнуть.</h3>
            <?php
                require("connectdb.php");
                $stmt = $connect->prepare("SELECT COUNT(`id`) FROM field");
                $resultCountField = $stmt->execute();
                $resultCountField = mysqli_stmt_get_result($stmt);

                $stmt = $connect->prepare("SELECT COUNT(`id`) FROM addedPlaces");
                $resultCountAddedPlaces = $stmt->execute();
                $resultCountAddedPlaces = mysqli_stmt_get_result($stmt);

                $stmt->close();

                $countField = mysqli_fetch_assoc($resultCountField);
                $countAddedPlaces = mysqli_fetch_assoc($resultCountAddedPlaces);
                $count = $countField['COUNT(`id`)'] + $countAddedPlaces['COUNT(`id`)'];
            ?>
            <h3> Мы уже собрали множество ледовых полей, а именно: <?php echo $count?> . Из них <?php echo $countAddedPlaces['COUNT(`id`)']?> добавили наши пользователи </h3>
            <h3> Выбери один их понравившихся тебе пунктов: </h3>
            </h3>
            <p><ul class = "functionList">
                <li>
                    <a href="allInformation.php">Просмотр информации о ледовых полях</a>
                </li>
                <br>
                <li>
                    <a href="formDistrict.php">Подобрать в своем районе</a>
                </li>
                <br>
                <li>
                    <a href="formAdmArea.php">Подобрать в административном округе</a>
                </li>
                <br>
                <li>
                    <a href="interviewOne.php">Опрос для подбора ледового поля</a>
                </li>
                <br>
                <li>
                    <a href="create.php">Добавить запись</a>
                </li>
                <br>
                <li>
                    <a href="#">Оценить ледовое поле</a>
                </li>
                <br>
            </ul></p>
            
        </div>
    </section>
    <?php require("layoutFiles/footer.php") ?>
