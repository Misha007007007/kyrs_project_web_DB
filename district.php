<?php require("layoutFiles/header.php") ?>

                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <?php
                error_reporting(0);
                $dictrict;
                $interview = "Район";
                echo "<h3>Вы выбрали ";
                if($_POST['district'] == ""){
                    echo $_GET['district'];
                    $dictrict = $_GET['district'];
                }
                else{
                    echo $_POST['district'];
                    $dictrict = $_POST['district'];
                }
                echo "</h3>";
                
                include "connectdb.php";
                
                
                $stmt = $connect->prepare("SELECT * FROM `field` WHERE district = ?");
                $stmt->bind_param("s", $dictrict);
                $result = $stmt->execute();
                
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();

                //$row = mysqli_fetch_row($result);
                while($entry = mysqli_fetch_assoc($result)){
                    require("shortInfo.php");
                    echo ' <li><a href="addInfo.php?id='.$entry['id'].'&page='.$interview.'&district='.$dictrict.'">Дополнительная информация</a></li></ul>';
                }
            ?>
        </div>
    </section>
    <?php require("layoutFiles/footer.php") ?>
