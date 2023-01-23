<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            if($_POST['comment'] == null){
                header('Refresh: 2; http://localhost:3000/information/addInfo.php');
                echo "<h2>Невозможно добавить комментарий. Вы заполнили не все поля.</h2>";
            }
            else{
                require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
                $stmt = $connect->prepare("INSERT INTO `comments` (id_field, `comment`) VALUES (?, ?)");
                $stmt->bind_param("is", $_GET['id_field'], $_POST['comment']);
                $result = $stmt->execute();
                echo "<h2>Ваш комментарий добавлен!</h2>";
                
                // header('Refresh: 2; addInfo.php?id='.$id.'&page='.$page.'');
                
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
