<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php") ?>

                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <?php
                // error_reporting(0);
                $dictrict;
                $interview = "Район";
                echo "<h3>Вы выбрали ";
                
                if(array_key_exists('district',$_POST) == false){
                    echo $_GET['district'];
                    $dictrict = $_GET['district'];
                }
                else{
                    echo $_POST['district'];
                    $dictrict = $_POST['district'];
                }
                echo "</h3>";
                
                require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
                
                
                $stmt = $connect->prepare("SELECT * FROM `field` WHERE district = ?");
                $stmt->bind_param("s", $dictrict);
                $result = $stmt->execute();
                
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();

                //$row = mysqli_fetch_row($result);
                while($entry = mysqli_fetch_assoc($result)){
                    require("/var/www/u1840628/data/www/andreitsev.ru/information/shortInfo.php");
                    echo '<div class="links"> <li><a href="https://andreitsev.ru/information/addInfo.php?id='.$entry['id'].'&page='.$interview.'&district='.$dictrict.'">Дополнительная информация</a></li></ul> </div>';
                }
            ?>
        </div>
    </section>
    <?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php") ?>
