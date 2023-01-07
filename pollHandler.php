<?php require("header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <?php
                include "connectdb.php";
                $interview = "Опрос";
                $hasEquipmentRental;
                $hasTechService;
                $hasDressingRoom;
                $hasEatery;
                $hasToilet;
                $hasWifi;
                $hasCashMachine;
                $hasFirstAidPost;
                $hasMusic;

                $paid;
                $seats;
                // "'нет' OR hasEquipmentRental = 'да'";
                error_reporting(0);
                if($_POST['hasEquipmentRental'] == null) $hasEquipmentRental = 'нет';
                else $hasEquipmentRental = 'да';

                if($_POST['hasTechService'] == null) $hasTechService = 'нет';
                else $hasTechService = 'да';

                if($_POST['hasDressingRoom'] == null) $hasDressingRoom = 'нет';
                else $hasDressingRoom = 'да';

                if($_POST['hasEatery'] == null) $hasEatery = 'нет';
                else $hasEatery = 'да';

                if($_POST['hasToilet'] == null) $hasToilet = 'нет';
                else $hasToilet = 'да';

                if($_POST['hasWifi'] == null) $hasWifi = 'нет';
                else $hasWifi = 'да';

                if($_POST['hasCashMachine'] == null) $hasCashMachine = 'нет';
                else $hasCashMachine = 'да';

                if($_POST['hasFirstAidPost'] == null) $hasFirstAidPost = 'нет';
                else $hasFirstAidPost = 'да';

                if($_POST['hasMusic'] == null) $hasMusic = 'нет';
                else $hasMusic = 'да';

                if($_POST['paid'] == null) $paid = 'платно';
                else $paid = 'бесплатно';

                if($_POST['seats'] == null) $seats = 0;
                else $seats = 1;

                echo $hasEquipmentRental;
                
                if($_POST['district'] == "Район не важен"){
                    $stmt = $connect->prepare("SELECT * FROM `field` WHERE hasEquipmentRental = ? AND hasTechService = ? AND hasDressingRoom = ? AND hasEatery = ? AND hasToilet = ? AND hasWifi = ? AND hasCashMachine = ? AND hasFirstAidPost = ? AND hasMusic = ? AND paid = ? AND seats >= ?");
                    $stmt->bind_param("ssssssssssi", $hasEquipmentRental, $hasTechService, $hasDressingRoom, $hasEatery, $hasToilet, $hasWifi, $hasCashMachine, $hasFirstAidPost, $hasMusic, $paid, $seats);
                    
                    $result = $stmt->execute();
                    
                    $result = mysqli_stmt_get_result($stmt);
                    $stmt->close();
                }
                else{
                    $dictrict = $_POST['district'];
                    $stmt = $connect->prepare("SELECT * FROM `field` WHERE district = ? AND hasEquipmentRental = ? AND hasTechService = ? AND hasDressingRoom = ? AND hasEatery = ? AND hasToilet = ? AND hasWifi = ? AND hasCashMachine = ? AND hasFirstAidPost = ? AND hasMusic = ? AND paid = ? AND seats >= ?");
                    $stmt->bind_param("sssssssssssi", $dictrict, $hasEquipmentRental, $hasTechService, $hasDressingRoom, $hasEatery, $hasToilet, $hasWifi, $hasCashMachine, $hasFirstAidPost, $hasMusic, $paid, $seats);
                    $result = $stmt->execute();
                    
                    $result = mysqli_stmt_get_result($stmt);
                    $stmt->close();
                    
                }
                
                
                if(mysqli_fetch_assoc($result) == 0){
                    echo "<h3>К сожалению мы не нашли для Вас подходящего ледового поля.</h3>
                    <h3>Вы можете <a href='interviewOne.php'>пройти опрос заново<a>.</h3>
                    <h3>Посмотреть доступные ледовые поля в Вашем <a href='formDistrict.php'>районе</a> или <a href='formDistrict.php'>Административном округе</a>.</h3>
                    <h3>или <a href='allInformation.php'>просмотреть общую информацию о ледовых полях</a>.</h3>";
                }
                else{
                    while($entry = mysqli_fetch_assoc($result)){
                        echo '<h4>' . $entry['objectName'] . '</h4> 
                            <p>Данное место расположено по адресу: ' . $entry['admArea'] . ', ' . $entry['district'] . ',  ' . $entry['address'] . '.</p>
                            <p>Для связи используйте: </p>
                            <ul>';
                            if ($entry['email'] != null)
                                echo '<li>Email: ' . $entry['email'] . ' </li>';
                            else
                                echo "";

                            if ($entry['webSite'] != null)
                                echo ' <li>Сайт: <a href=https://' . $entry['webSite'] . '>' . $entry['webSite'] . '<a></li>';
                            else
                                echo "";

                            if ($entry['helpPhone'] != null)
                                echo '<li> Справочный телефон: ' . $entry['helpPhone'] . '</li>';
                            else
                                echo "";
                            
                            if ($entry['helpPhoneExtension'] != null)
                                echo '<li>Добавочный номер: ' . $entry['helpPhoneExtension'] . '</li>';
                            else
                                echo "";
                            
                            echo '
                            <li><a href="addInfo.php?id='.$entry['id'].'&page='.$interview.'">Дополнительная информация</a></li>';
                            
                    }
                }
            ?>
        </div>
    </section>
    <?php require("footer.php") ?>



