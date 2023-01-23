<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>

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
                
                require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
                
                
                $stmt = $connect->prepare("SELECT * FROM `field` WHERE district = ?");
                $stmt->bind_param("s", $dictrict);
                $result = $stmt->execute();
                
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();

                //$row = mysqli_fetch_row($result);
                while($entry = mysqli_fetch_assoc($result)){
                    require("C:/localhost/front/kyrs_project_web/information/shortInfo.php");
                    echo '<div class="links"> <li><a href="http://localhost:3000/information/addInfo.php?id='.$entry['id'].'&page='.$interview.'&district='.$dictrict.'">Дополнительная информация</a></li></ul> </div>';
                }
            ?>
        </div>
    </section>
    <?php require("layoutFiles/footer.php") ?>
