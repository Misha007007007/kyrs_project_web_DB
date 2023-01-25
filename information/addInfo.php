<?php 
require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php");
                            if($_GET['page'] == 'Опрос') echo '<li><a href="interview/pollHandler.php?dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].'">Назад</a></li>';
                            else if($_GET['page'] == 'ВсяИнформация') echo '<li><a href="allInformation.php">Назад</a></li></li>';
                            else if($_GET['page'] == 'Район') echo '<li><a href="selectionByDistrict/district.php?district='.$_GET['district'].'">Назад</a></li>';
                            else if($_GET['page'] == 'Округ') echo '<li><a href="selectionByAdmArea/admArea.php?admArea='.$_GET['admArea'].'">Назад</a></li>';
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <div class="info">
                <h1></h1>
                <?php
                    require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");

                    $stmt = $connect->prepare("SELECT * FROM field WHERE id = ?");
                    $stmt->bind_param("s", $_GET['id']);

                    $result = $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                    $stmt->close();

                    $entry = mysqli_fetch_assoc($result);

                    if(!$result || mysqli_num_rows($result) == 0){
                        echo "<h2>Пока здесь нет такой информации.</h2>";
                    }
                    else{
                        echo '<h1>' . $entry['objectName'] . '</h1>';
                    
                        echo '<table border = 0>
                        <tr>
                            <th>День недели</th>
                            <th>Часы работы</th>
                        </tr>';
                        if ($entry['workingHoursSummer'] != null){
                            echo '<h3>График работы ';
                            if($entry['usagePeriodSummer'] != null){
                                $month = explode("-", $entry['usagePeriodSummer']);
                                echo '(c '.$month[0].' по '.$month[1].')</h3>';
                            }
                            else{
                                echo'';
                            }
                            $schedule = $entry['workingHoursSummer'];
                            $one = explode("DayOfWeek:", $schedule);
                            
                            $i = 0;
                            while ($i < count($one) - 1) {
                                $i++;
                                $two = explode("Hours:", $one[$i]);
                                $n = 1;
                                
                                echo '<tr><th>'.$two[0].'  </th>';
                                echo '<th>' .$two[1]. '  </th></tr>';   
                            }
                        }
                        else{
                            echo "";
                        } 
                        $latitude = $entry['latitude'];
                        $longitude = $entry['longitude'];
                        if($_GET['page'] == 'Опрос') echo '<h3><div class="mapLink"><a href="http://localhost:3000/map/map.html?id_field='.$entry['id'].'&page='.$_GET['page'].'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].'&latitude='.$latitude.'&longitude='.$longitude.'">Посмотреть местоположение на карте</a></div></h3>';
                        else if($_GET['page'] == 'ВсяИнформация') echo '<h3><div class="mapLink"><a href="http://localhost:3000/map/map.html?id_field='.$entry['id'].'&page='.$_GET['page'].'&latitude='.$latitude.'&longitude='.$longitude.'">Посмотреть местоположение на карте</a></div></h3>';
                        else if($_GET['page'] == 'Район') echo '<h3><div class="mapLink"><a href="http://localhost:3000/map/map.html?id_field='.$entry['id'].'&page='.$_GET['page'].'&district='.$_GET['district'].'&latitude='.$latitude.'&longitude='.$longitude.'">Посмотреть местоположение на карте</a></div></h3>';
                        else if($_GET['page'] == 'Округ') echo '<h3><div class="mapLink"><a href="http://localhost:3000/map/map.html?id_field='.$entry['id'].'&page='.$_GET['page'].'&admArea='.$_GET['admArea'].'&latitude='.$latitude.'&longitude='.$longitude.'">Посмотреть местоположение на карте</a></div></h3>';
                        else  echo '<h3><div class="mapLink"><a href="http://localhost:3000/map/map.html?id_field='.$entry['id'].'&page=ВсяИнформация.&latitude='.$latitude.'&longitude='.$longitude.'">Посмотреть местоположение на карте</a></div></h3>';

                        $stmt = $connect->prepare("SELECT * FROM rating WHERE id_field = ?");
                        $stmt->bind_param("i", $entry['id']);
    
                        $resultRating = $stmt->execute();
                        $resultRating = mysqli_stmt_get_result($stmt);
                        $stmt->close();
    
                        $entryRating = mysqli_fetch_assoc($resultRating);
                        if(!$resultRating || mysqli_num_rows($resultRating) == 0){
                            echo "<h3>Пока не один пользователь не оценил данное место.</h3>";
                        }
                        else{
                            $averageResult = $entryRating['sum'] / $entryRating['number'];
                            echo "<h3>Рейтинг, определенный оценками пользоваетлей: $averageResult из 5 </h3>";
                        }

                        echo '<table border="1">
                        <tr>
                            <th>Параметр</th>
                            <th>Комментарий</th>
                        </tr>';
                        
                        if ($entry['hasEquipmentRental'] == "да")
                            echo '<tr><th>Присутствует возможность проката оборудования</th>';
                        else
                            echo "<tr><th>Отсутсвует возможность проката оборудования</th>";
                        
                        if ($entry['equipmentRentalComments'] != null)
                            echo '<th>' . $entry['equipmentRentalComments'] . '</th></tr>';
                        else
                            echo "<th>Отсутсвует</th></tr>";
  
                        if ($entry['hasTechService'] == "да")
                            echo '<tr><th>Присутствует сервис технического обслуживания</th>';
                        else
                            echo "<tr><th>Отсутсвует сервис технического обслуживания</th>";
                        
                        if ($entry['techServiceComments'] != null)
                            echo '<th>' . $entry['techServiceComments'] . '</th></tr>';
                        else
                            echo "<th>Отсутсвует</th></tr>";

                        if ($entry['paid'] != null)
                            echo '<tr><th>Форма посещения (платность): ' . $entry['paid'] . ' </th>';
                        else
                            echo '<tr><th>Форма посещения (платность): неизвестно</th>';
                        
                        if ($entry['paidComments'] != null)
                            echo '<th>' . $entry['paidComments'] . '</th></tr></table>';
                        else
                            echo "<th>Отсутсвует</th></tr></table>";
                        
                        $yes = '<th>+</th></tr>';
                        $no = '<th>-</th></tr>';

                        echo '<table border="2">
                        <tr>
                            <th>Параметр</th>
                            <th>Наличие</th>
                        </tr>
                        <tr>
                            <th>Наличие раздевалки</th>';
                        if ($entry['paidComments'] == "да")
                            echo $yes;
                        else
                            echo $no;
                        echo '<tr><th>Наличие точки питания</th>';
                        if ($entry['hasEatery'] == "да")
                            echo $yes;
                        else
                            echo $no;
                        echo '<tr><th>Наличие туалета</th>';
                        if ($entry['hasToilet'] == "да")
                            echo $yes;
                        else
                            echo $no;
                        echo '<tr><th>Наличие точки Wi-Fi</th>';
                        if ($entry['hasWifi'] == "да")
                            echo $yes;
                        else
                            echo $no;
                        echo '<tr><th>Наличие банкомата</th>';
                        if ($entry['hasCashMachine'] == "да")
                            echo $yes;
                        else
                            echo $no;
                        echo '<tr><th>Наличие медпункта</th>';
                        if ($entry['hasFirstAidPost'] == "да")
                            echo $yes;
                        else
                            echo $no;
                        echo '<tr><th>Наличие звукового сопровождения</th>';
                        if ($entry['hasMusic'] == "да")
                            echo $yes;
                        else
                            echo $no;

                        echo '<tr><th>Освещение</th>';
                        if ($entry['lighting'] != null)
                            echo '<th>' . $entry['lighting'] . '</th></tr>';
                        else
                            echo '<th>-</th></tr>';

                        echo '<tr><th>Количество оборудованных посадочных мест</th>';
                        if ($entry['seats'] != null)
                            echo '<th>' . $entry['seats'] . '</th></tr>';
                        else
                            echo '<th>-</th></tr>';

                        echo '<tr><th>Приспособленность для занятий инвалидов</th>';
                        if ($entry['disabilityFriendly'] != null)
                            echo '<th>' . $entry['disabilityFriendly'] . '</th></tr></table>';
                        else
                            echo '<th>-</th></tr></table>';
                        
                        if ($entry['nameSummer'] != null)
                            echo ' <h3>Информация о ледовом поле во время летнего периода</h3>
                            <h3>Название спортивной зоны в летний период - " ' . $entry['nameSummer'] . '"</h3>';
                        else
                            echo '<h3>Информация о ледовом поле во время летнего периода</h3>';

                        if ($entry['surfaceTypeSummer'] != null)
                            echo ' <h3>Во время летнего периода покрытием на площадке является ' . $entry['surfaceTypeSummer'] . '.</h3>';
                        else
                            echo '';

                        if ($entry['servicesSummer'] != null)
                            echo ' <h3>Так же оказываются такие услуги, как: ' . $entry['servicesSummer'] . '.</h3>';
                        else
                            echo '';  
                        // комментарии 
                        $stmt = $connect->prepare("SELECT * FROM comments WHERE id_field = ?");
                        $stmt->bind_param("i", $entry['id']);
    
                        $resultComment = $stmt->execute();
                        $resultComment = mysqli_stmt_get_result($stmt);
                        
                        $stmt->close();

                        if(!$_SESSION){
                            echo '';
                        }
                        else {
                            // избранные записи

                            if($_GET['page'] == 'Опрос') $parametrsFavorit = 'http://localhost:3000/featuredEntries/entriesFavorit.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].' ';   
                            else if($_GET['page'] == 'ВсяИнформация') $parametrsFavorit = 'http://localhost:3000/featuredEntries/entriesFavorit.php?id_field='.$entry['id'].'&page='.$_GET['page'].'';
                            else if($_GET['page'] == 'Район') $parametrsFavorit = 'http://localhost:3000/featuredEntries/entriesFavorit.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&district='.$_GET['district'].'';
                            else if($_GET['page'] == 'Округ') $parametrsFavorit = 'http://localhost:3000/featuredEntries/entriesFavorit.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&admArea='.$_GET['admArea'].'';
                            else  $parametrsFavorit = 'http://localhost:3000/featuredEntries/entriesFavorit.php?id_field='.$entry['id'].'&page=ВсяИнформация';
                            
                            echo '<h3><div class="mapLink"><a href="'.$parametrsFavorit.'">Добавить в избранное</a></div></h3>';
                        }
                        
    
                        echo '<h1>Комментарии наших пользователей</h1>';
                        if(!$resultComment || mysqli_num_rows($resultComment) == 0){
                            echo "<h4>Пока никто не написал комментарий</h4>";
                        }
                        else{
                            while($comments = mysqli_fetch_assoc($resultComment)){
                                
                                if(!$_SESSION){
                                    echo '<div class="comment"> '.$comments['comment'].' </div>';
                                }
                                else{
                                    if($_SESSION["role"] == 1 || $_SESSION["role"] == 2)
                                        echo '<div class="comment"> '.$comments['comment'].'<br><a href="http://localhost:3000/admin/deleteComment.php?id='.$comments['id'].'&id_field='.$entry['id'].'&page='.$_GET['page'].'"> Удалить </a></div>';    
                                    else
                                        echo '<div class="comment"> '.$comments['comment'].' </div>';
                                }
                            }
                        }
                        
                        if(!$_SESSION){
                            echo '';
                        }
                        else {
                            // форма для добавления комментов
                            if($_GET['page'] == 'Опрос') $parametrs = 'http://localhost:3000/comments/commentAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].' ';
                            else if($_GET['page'] == 'ВсяИнформация') $parametrs = 'http://localhost:3000/comments/commentAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'';
                            else if($_GET['page'] == 'Район') $parametrs = 'http://localhost:3000/comments/commentAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&district='.$_GET['district'].'';
                            else if($_GET['page'] == 'Округ') $parametrs = 'http://localhost:3000/comments/commentAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&admArea='.$_GET['admArea'].'';
                            else  $parametrs = 'http://localhost:3000/comments/commentAnalysis.php?id_field='.$entry['id'].'&page=ВсяИнформация';

                            echo '<div class="commentAdd">
                                    <form action="'.$parametrs.'" method="POST">
                                        <textarea name="comment" id="text" cols="45" rows="2" placeholder="Комментарий"></textarea>
                                        <input type="submit" value="Добавить комментарий">
                                    </form>
                                </div>'; 
                            
                                if($_GET['page'] == 'Опрос') $parametrsMark = 'http://localhost:3000/userRatings/ratingAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].' ';
                                else if($_GET['page'] == 'ВсяИнформация') $parametrsMark = 'http://localhost:3000/userRatings/ratingAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'';
                                else if($_GET['page'] == 'Район') $parametrsMark = 'http://localhost:3000/userRatings/ratingAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&district='.$_GET['district'].'';
                                else if($_GET['page'] == 'Округ') $parametrsMark = 'http://localhost:3000/userRatings/ratingAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&admArea='.$_GET['admArea'].'';
                                else  $parametrsMark = 'http://localhost:3000/userRatings/ratingAnalysis.php?id_field='.$entry['id'].'&page=ВсяИнформация';
        
                            echo '<br><div class="mark">
                                <form action="'.$parametrsMark.'" method="post">
                                    <div class="radioBut">
                                        <input type="radio" id="1" name="grade" value="1">
                                        <label for="1">1</label>
                                    
                                        <input type="radio" id="2" name="grade" value="2">
                                        <label for="2">2 </label>
                                    
                                        <input type="radio" id="3" name="grade" value="3">
                                        <label for="4">3</label>
                
                                        <input type="radio" id="4" name="grade" value="4">
                                        <label for="4">4</label>
                
                                        <input type="radio" id="5" name="grade" value="5">
                                        <label for="5">5</label>
                                    </div>
                                    <input type="submit" value="Оценить">
                                    </div>
                                </form>';
                        }
                    }
                ?>
                
            </div> 
        </div>
    </section>
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>