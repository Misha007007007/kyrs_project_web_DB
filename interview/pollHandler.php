<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
                    <li>
                        <a href="interviewOne.php">
                            Пройти опрос заново
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <?php
                require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
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
                
                if(array_key_exists('incompleteQuery',$_GET) == false){
                    if($_POST['district'] == 'Район не важен') $dictrict = "SELECT * FROM `field` WHERE district LIKE '%' ";
                    else $dictrict = "SELECT * FROM `field` WHERE district = \"".$_POST['district']."\" ";  
                    
                    if(array_key_exists('hasEquipmentRental',$_POST) == false) $hasEquipmentRental = "AND hasEquipmentRental LIKE '%' ";
                    else $hasEquipmentRental = "AND hasEquipmentRental = 'да' ";

                    if(array_key_exists('hasTechService',$_POST) == false) $hasTechService = "AND hasTechService LIKE '%' ";
                    else $hasTechService = "AND hasTechService = 'да' ";

                    if(array_key_exists('hasDressingRoom',$_POST) == false) $hasDressingRoom = "AND hasDressingRoom LIKE '%' ";
                    else $hasDressingRoom = "AND hasDressingRoom = 'да' ";

                    if(array_key_exists('hasEatery',$_POST) == false) $hasEatery = "AND hasEatery LIKE '%' ";
                    else $hasEatery = "AND hasEatery = 'да' ";

                    if(array_key_exists('hasToilet',$_POST) == false) $hasToilet = "AND hasToilet LIKE '%' ";
                    else $hasToilet = "AND hasToilet = 'да' ";

                    if(array_key_exists('hasWifi',$_POST) == false) $hasWifi = "AND hasWifi LIKE '%' ";
                    else $hasWifi = "AND hasWifi = 'да' ";

                    if(array_key_exists('hasCashMachine',$_POST) == false) $hasCashMachine = "AND hasCashMachine LIKE '%' ";
                    else $hasCashMachine = "AND hasCashMachine = 'да' ";

                    if(array_key_exists('hasFirstAidPost',$_POST) == false) $hasFirstAidPost = "AND hasFirstAidPost LIKE '%' ";
                    else $hasFirstAidPost = "AND hasFirstAidPost = 'да' ";

                    if(array_key_exists('hasMusic',$_POST) == false) $hasMusic = "AND hasMusic LIKE '%' ";
                    else $hasMusic = "AND hasMusic = 'да' ";

                    if(array_key_exists('paid',$_POST) == false) $paid = "AND paid LIKE '%' ";
                    else $paid = "AND paid = 'бесплатно' ";

                    if(array_key_exists('seats',$_POST) == false) $seats = "AND seats >= 0; ";
                    else $seats = "AND seats >= 1; ";
                    $incompleteQuery = $hasEquipmentRental.$hasTechService.$hasDressingRoom.$hasEatery.$hasToilet.$hasWifi.$hasCashMachine.$hasFirstAidPost.$hasMusic.$paid.$seats;   
                    $query = $dictrict.$incompleteQuery; 
                    $result = mysqli_query($connect, $query);  
                } 
                if(array_key_exists('incompleteQuery',$_GET) == true){
                    if($_GET['dictrict'] == 'Район не важен') $dictrict = "SELECT * FROM `field` WHERE district LIKE '%' ";
                    else $dictrict = "SELECT * FROM `field` WHERE district = \"".$_GET['dictrict']."\" ";  
                    
                    $query = $dictrict.$_GET['incompleteQuery'];
                    $result = mysqli_query($connect, $query);
                    // echo  $query;
                }
                
                
                if(!$result || mysqli_num_rows($result) == 0){
                    echo "<h3>К сожалению мы не нашли для Вас подходящего ледового поля.</h3>
                    <h3>Вы можете <a href='http://localhost:3000/interview/interviewOne.php'>пройти опрос заново<a>.</h3>
                    <h3>Посмотреть доступные ледовые поля в Вашем <a href='formDistrict.php'>районе</a> или <a href='formDistrict.php'>Административном округе</a>.</h3>
                    <h3>или <a href='allInformation.php'>просмотреть общую информацию о ледовых полях</a>.</h3>";
                }
                else{
                    while($entry = mysqli_fetch_assoc($result)){
                        require("C:/localhost/front/kyrs_project_web/information/shortInfo.php");
                        if(array_key_exists('incompleteQuery',$_GET) == false){   
                            echo '<div class="interviewLink"><li><a href="http://localhost:3000/information/addInfo.php?id='.$entry['id'].'&page='.$interview.'&dictrict='.$_POST['district'].'&incompleteQuery='.$incompleteQuery.'">Дополнительная информация</a></li></div>';
                        }
                        else{
                            echo '<div class="interviewLink"><li><a href="http://localhost:3000/information/addInfo.php?id='.$entry['id'].'&page='.$interview.'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].'">Дополнительная информация</a></li></div>';
                        }
                    }
                }
            ?>
        </div>
    </section>
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>


