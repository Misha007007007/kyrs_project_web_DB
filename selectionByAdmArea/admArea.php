<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <?php
                $admArea;
                $interview = "Округ";
                // error_reporting(0);
                
                if(array_key_exists('admArea',$_POST) == false ){
                    echo "<h3>Вы выбрали ";
                    echo $_GET['admArea'];
                    $admArea = $_GET['admArea'];
                    echo "</h3>";
                }
                else{
                    echo "<h3>Вы выбрали ";
                    $admArea = $_POST['admArea'];
                    echo $admArea;
                    echo "</h3>";
                }
                
                require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
                
                $stmt = $connect->prepare("SELECT * FROM `field` WHERE admArea = ?");
                $stmt->bind_param("s", $admArea);
                $result = $stmt->execute();
                
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();

                //$row = mysqli_fetch_row($result);
                while($entry = mysqli_fetch_assoc($result)){
                    require("C:/localhost/front/kyrs_project_web/infornation/shortInfo.php");
                    echo '<div class="links">  <li><a href="http://localhost:3000/information/addInfo.php?id='.$entry['id'].'&page='.$interview.'&admArea='.$admArea.'">Дополнительная информация</a></li></ul></div>';
                }
            ?>
        </div>
    </section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>
