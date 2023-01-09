<?php require("layoutFiles/header.php") ?>

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
                
                if($_POST['district'] == 'Район не важен') $dictrict = "SELECT * FROM `field` WHERE district LIKE '%' ";
                else $dictrict = "SELECT * FROM `field` WHERE district = \"".$_POST['district']."\" ";  
                
                if($_POST['hasEquipmentRental'] == null) $hasEquipmentRental = "AND hasEquipmentRental LIKE '%' ";
                else $hasEquipmentRental = "AND hasEquipmentRental = 'да' ";

                if($_POST['hasTechService'] == null) $hasTechService = "AND hasTechService LIKE '%' ";
                else $hasTechService = "AND hasTechService = 'да' ";

                if($_POST['hasDressingRoom'] == null) $hasDressingRoom = "AND hasDressingRoom LIKE '%' ";
                else $hasDressingRoom = "AND hasDressingRoom = 'да' ";

                if($_POST['hasEatery'] == null) $hasEatery = "AND hasEatery LIKE '%' ";
                else $hasEatery = "AND hasEatery = 'да' ";

                if($_POST['hasToilet'] == null) $hasToilet = "AND hasToilet LIKE '%' ";
                else $hasToilet = "AND hasToilet = 'да' ";

                if($_POST['hasWifi'] == null) $hasWifi = "AND hasWifi LIKE '%' ";
                else $hasWifi = "AND hasWifi = 'да' ";

                if($_POST['hasCashMachine'] == null) $hasCashMachine = "AND hasCashMachine LIKE '%' ";
                else $hasCashMachine = "AND hasCashMachine = 'да' ";

                if($_POST['hasFirstAidPost'] == null) $hasFirstAidPost = "AND hasFirstAidPost LIKE '%' ";
                else $hasFirstAidPost = "AND hasFirstAidPost = 'да' ";

                if($_POST['hasMusic'] == null) $hasMusic = "AND hasMusic LIKE '%' ";
                else $hasMusic = "AND hasMusic = 'да' ";

                if($_POST['paid'] == null) $paid = "AND paid LIKE '%' ";
                else $paid = "AND paid = 'бесплатно' ";

                if($_POST['seats'] == null) $seats = "AND seats >= 0; ";
                else $seats = "AND seats >= 1; ";

                $query = $dictrict.$hasEquipmentRental.$hasTechService.$hasDressingRoom.$hasEatery.$hasToilet.$hasWifi.$hasCashMachine.$hasFirstAidPost.$hasMusic.$paid.$seats;
                echo $query;
                  
                $result = mysqli_query($connect, $query);
                
                
                if(!$result || mysqli_num_rows($result) == 0){
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
    <?php require("layoutFiles/footer.php") ?>


