<?php require("layoutFiles/header.php") ?>
                    <li>
                        <?php
                            if($_GET['page'] == 'Опрос') echo '<a href="pollHandler.php">Назад</a>';
                            else if($_GET['page'] == 'ВсяИнформация') echo '<a href="allInformation.php">Назад</a>';
                            else if($_GET['page'] == 'Район') echo '<a href="district.php?district='.$_GET['district'].'">Назад</a>';
                            
                            else if($_GET['page'] == 'Округ') echo '<a href="admArea.php?admArea='.$_GET['admArea'].'">Назад</a>';
                            
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
                        echo '<table border="2">
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
                            <h4>Название спортивной зоны в летний период ' . $entry['nameSummer'] . '</h4>';
                        else
                            echo '<h3>Информация о ледовом поле во время летнего периода</h3>';
                        
                    


                    
                    }
                ?>
                
                <br><br><br><br><br>
            </div> 
        </div>
    </section>
    <?php require("layoutFiles/footer.php") ?>