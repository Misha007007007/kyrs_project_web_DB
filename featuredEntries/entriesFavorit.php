<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            
            require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
            
            $stmt = $connect->prepare("SELECT * FROM `favorites` WHERE `id_user`= ? AND `id_field` = ?");
            $stmt->bind_param("ii", $_SESSION['id_user'], $_GET['id_field']);
            $result = $stmt->execute();
            $result = mysqli_stmt_get_result($stmt);
            $stmt->close();

            
            if(!$result || mysqli_num_rows($result) == 0){
                $stmt = $connect->prepare("INSERT INTO `favorites` (id_user, id_field) VALUES (?, ?)");
                $stmt->bind_param("ii", $_SESSION['id_user'], $_GET['id_field']);
                $result = $stmt->execute();
                echo "<h2>Ледовое поле добавлена в избранное!</h2>";
            }else {
                echo "<h2>Данное ледовое поле ранее уже было добвлено в избранное!</h2>";
            }
                
            
            $id = $_GET['id_field'];
            $page = $_GET['page'];
            if($_GET['page'] == 'Опрос') $parametrs = '<a href="http://localhost:3000/information/addInfo.php?id='.$id.'&page='.$page.'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].'">НАЗАД</a>';       
            else if($_GET['page'] == 'ВсяИнформация') $parametrs = '<a href="http://localhost:3000/information/addInfo.php?id='.$id.'&page='.$page.'">НАЗАД</a>';
            else if($_GET['page'] == 'Район') $parametrs = '<a href="http://localhost:3000/information/addInfo.php?id='.$id.'&page='.$page.'&district='.$_GET['district'].'">НАЗАД</a>';
            else if($_GET['page'] == 'Округ') $parametrs = '<a href="http://localhost:3000/information/addInfo.php?id='.$id.'&page='.$page.'&admArea='.$_GET['admArea'].'">НАЗАД</a>';
            echo '<div class="commentLink"><h3>'.$parametrs.'</h3></div>';
            echo '<div class="commentLink"><h3><a href="http://localhost:3000/index.php"> Вернуться на главную  </a></h3></div>';
        ?>
        
    </section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>
