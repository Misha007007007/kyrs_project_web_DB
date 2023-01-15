<?php require("layoutFiles/header.php") ?>
                    <li>
                        <?php
                            require("session.php");
                            if (!$session_user){
                                if($_GET['page'] == 'Опрос') echo '<a href="pollHandler.php?dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].'">Назад</a>';
                                else if($_GET['page'] == 'ВсяИнформация') echo '<a href="allInformation.php">Назад</a>';
                                else if($_GET['page'] == 'Район') echo '<a href="district.php?district='.$_GET['district'].'">Назад</a>';
                                else if($_GET['page'] == 'Округ') echo '<a href="admArea.php?admArea='.$_GET['admArea'].'">Назад</a>';
                                
                            }
                            else{
                                echo '<a href="allInformation.php">Все записи</a>';
                            }
                            
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
                    require("connectdb.php");
                    
                    
                    $stmt = $connect->prepare("SELECT * FROM field WHERE id = ?");
                    $stmt->bind_param("s", $_GET['id']);

                    $result = $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                    $stmt->close();

                    $entry = mysqli_fetch_assoc($result);

                    if(!$result || mysqli_num_rows($result) == 0){
                        echo "Пока здесь нет такой информации.";
                    }
                    else{
                        echo '<h1>' . $entry['objectName'] . '</h1>';
                    
                        echo '<table border = 1>
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
                                
                                echo '<tr><th>'.$two[0].'</th>';
                                echo '<th>' .$two[1]. '</th></tr>';   
                            }
                        }
                        else{
                            echo "";
                        }

                        $stmt = $connect->prepare("SELECT * FROM rating WHERE address = ?");
                        $stmt->bind_param("s", $entry['address']);
    
                        $resultRating = $stmt->execute();
                        $resultRating = mysqli_stmt_get_result($stmt);
                        $stmt->close();
    
                        $entryRating = mysqli_fetch_assoc($resultRating);
                        if(!$resultRating || mysqli_num_rows($resultRating) == 0){
                            echo "<h4>Пока не один пользователь не оценил данное место.</h4>";
                        }
                        else{
                            $averageResult = $entryRating['sum'] / $entryRating['number'];
                            echo "<h4>Рейтинг, определенный оценками пользоваетлей: $averageResult из 5 </h4>";
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
                            <h4>Название спортивной зоны в летний период - " ' . $entry['nameSummer'] . '"</h4>';
                        else
                            echo '<h3>Информация о ледовом поле во время летнего периода</h3>';

                        if ($entry['surfaceTypeSummer'] != null)
                            echo ' <h4>Во время летнего периода покрытием на площадке является ' . $entry['surfaceTypeSummer'] . '.</h4>';
                        else
                            echo '';

                        if ($entry['servicesSummer'] != null)
                            echo ' <h4>Так же оказываются такие услуги, как: ' . $entry['servicesSummer'] . '.</h4>';
                        else
                            echo '';  
                        
                        // комментарии 
                        $stmt = $connect->prepare("SELECT * FROM comments WHERE id_field = ?");
                        $stmt->bind_param("i", $entry['id']);
    
                        $resultComment = $stmt->execute();
                        $resultComment = mysqli_stmt_get_result($stmt);
                        
                        $stmt->close();
    
                        echo ' <h1>Комментарии наших пользователей</h1>';
                        if(!$resultComment || mysqli_num_rows($resultComment) == 0){
                            echo "<h4>Пока никто не написал комментарий</h4>";
                        }
                        else{
                            while($comments = mysqli_fetch_assoc($resultComment)){
                                
                                if(!$session_user){
                                    echo '<div class="comment"> '.$comments['comment'].' </div>';
                                }
                                else{
                                    
                                    if($session_user['role'] == 1 || $session_user['role'] == 2)
                                        echo '<div class="comment"> '.$comments['comment'].'<br><a href="deleteComment.php?id='.$comments['id'].'&id_field='.$entry['id'].'&page='.$_GET['page'].'"> Удалить </a></div>';    
                                    else
                                        echo '';
                                }
                            }
                        }

                        // форма для добавления комментов
                        if($_GET['page'] == 'Опрос') $parametrs = 'commentAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].'';
                        else if($_GET['page'] == 'ВсяИнформация') $parametrs = 'commentAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'';
                        else if($_GET['page'] == 'Район') $parametrs = 'commentAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&district='.$_GET['district'].'';
                        else if($_GET['page'] == 'Округ') $parametrs = 'commentAnalysis.php?id_field='.$entry['id'].'&page='.$_GET['page'].'&admArea='.$_GET['admArea'].'';
                        else  $parametrs = 'commentAnalysis.php?id_field='.$entry['id'].'&page=ВсяИнформация';
                        
                        
                        echo '<div class="commentAdd">
                                <form action="'.$parametrs.'" method="POST">
                                    <textarea name="comment" id="text" cols="61" rows="2" placeholder="Комментарий"></textarea>
                                    <input type="submit" value="Добавить комментарий">
                                </form>
                            </div>';
                       

                        
                    }
                ?>
                
                
            </div> 
        </div>
    </section>
    <?php require("layoutFiles/footer.php") ?>