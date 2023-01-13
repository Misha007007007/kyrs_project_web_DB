<?php require("layoutFiles/header.php") ?>
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
                    echo "<h2>Ошибка. Неверные данные</h2>";
                    header('Refresh: 5; index.php');
                }
                else{
                    echo "<h3>Вы выбрали ";
                    $admArea = $_POST['admArea'];
                    echo $admArea;
                    echo "</h3>";
                }
                
                require("connectdb.php");
                
                $stmt = $connect->prepare("SELECT * FROM `field` WHERE admArea = ?");
                $stmt->bind_param("s", $admArea);
                $result = $stmt->execute();
                
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();

                //$row = mysqli_fetch_row($result);
                while($entry = mysqli_fetch_assoc($result)){
                    require("shortInfo.php");
                    echo ' <li><a href="addInfo.php?id='.$entry['id'].'&page='.$interview.'&admArea='.$admArea.'">Дополнительная информация</a></li></ul>';
                }
            ?>
        </div>
    </section>
    <?php require("layoutFiles/footer.php") ?>
