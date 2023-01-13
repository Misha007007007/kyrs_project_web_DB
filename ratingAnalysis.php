<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            if(array_key_exists('address',$_POST) == false || array_key_exists('grade',$_POST) == false ){
                echo "<h2>Невозможно оценить. Вы заполнили не все поля.</h2>";
                header('Refresh: 2; formRaiting.php');
            }
            else{
                require("connectdb.php");
                $stmt = $connect->prepare("SELECT * FROM `rating` WHERE `address` = ?");
                $stmt->bind_param("s", $_POST['address']);
                echo $_POST['address'];
                
                $resultOne = $stmt->execute();
                $resultOne = mysqli_stmt_get_result($stmt);
                $rowRaiting = mysqli_fetch_array($resultOne);
                $stmt->close();

               
                
                if(mysqli_fetch_row($resultOne) == 0){
                    $number_ratings = 1;
                    $stmt = $connect->prepare("INSERT INTO `rating` (address, `sum`, number) VALUES (?, ?, ?)");
                    $stmt->bind_param("sii", $_POST['address'], $_POST['grade'], $number_ratings);
                    $result = $stmt->execute();
                    echo "<h2>Спасибо за оценку!</h2>";
                    header('Refresh: 2; index.php');
                }
                else{
                    $sum_grades = $rowRaiting['sum'] + $_POST['grade'];
                    $number_ratings = $rowRaiting['number'] + 1;
                    $stmt = $connect->prepare("UPDATE rating SET `sum` = ?, number = ? WHERE address = ?");
                    $stmt->bind_param("iis", $sum_grades, $number_ratings, $_POST['address']);
                    $resultr = $stmt->execute();
                    echo "<h2>Спасибо за оценку!</h2>";
                    header('Refresh: 2; index.php');
                    
                }
             }
        ?>
    </section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>
