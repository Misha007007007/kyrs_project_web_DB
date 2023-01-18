<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            if(array_key_exists('id_field',$_GET) == false || array_key_exists('grade',$_POST) == false ){
                echo "<h2>Ошибка. Вы перенесены на начальную страницу. </h2>";
                header('Refresh: 2; http://localhost:3000/index.php');
            }
            else{
                require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
                $stmt = $connect->prepare("SELECT * FROM `rating` WHERE `id_field` = ?");
                $stmt->bind_param("i", $_GET['id_field']);
                // echo $_POST['address'];
                
                $resultOne = $stmt->execute();
                $resultOne = mysqli_stmt_get_result($stmt);
                $rowRaiting = mysqli_fetch_array($resultOne);
                $stmt->close();

                if(mysqli_num_rows($resultOne) == 0){
                    $number_ratings = 1;
                    $stmt = $connect->prepare("INSERT INTO `rating` (id_field, `sum`, number) VALUES (?, ?, ?)");
                    $stmt->bind_param("iii", $_GET['id_field'], $_POST['grade'], $number_ratings);
                    $result = $stmt->execute();
                    echo "<h2>Спасибо за оценку!</h2>"; 
                }
                else{
                    $sum_grades = $rowRaiting['sum'] + $_POST['grade'];
                    $number_ratings = $rowRaiting['number'] + 1;
                    $stmt = $connect->prepare("UPDATE rating SET `sum` = ?, number = ? WHERE id_field = ?");
                    $stmt->bind_param("iii", $sum_grades, $number_ratings, $_GET['id_field']);
                    $resultr = $stmt->execute();
                    echo "<h2>Спасибо за оценку!</h2>";
                }
                if($_GET['page'] == 'Опрос') $parametrsMark = 'http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].' ';
                else if($_GET['page'] == 'ВсяИнформация') $parametrsMark = 'http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'';
                else if($_GET['page'] == 'Район') $parametrsMark = 'http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'&district='.$_GET['district'].'';
                else if($_GET['page'] == 'Округ') $parametrsMark = 'http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'&admArea='.$_GET['admArea'].'';
                else  $parametrsMark = 'http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page=ВсяИнформация';

                echo '<div class="linkRating"><h2><a href="'.$parametrsMark.'"> Вернуться назад </a></h2></div>';
                echo '<div class="linkRating"><h2><a href="http://localhost:3000/index.php"> Перейти на главную </a></h2></div>';
                
            }
            
        ?>
    </section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>
