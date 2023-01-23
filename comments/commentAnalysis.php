<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            if($_POST['comment'] == null){
                // header('Refresh: 2; https://andreitsev.ru/information/addInfo.php');
                echo "<h2>Невозможно добавить комментарий. Вы заполнили не все поля.</h2>";
            }
            else{
                require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
                $stmt = $connect->prepare("INSERT INTO `comments` (id_field, `comment`) VALUES (?, ?)");
                $stmt->bind_param("is", $_GET['id_field'], $_POST['comment']);
                $result = $stmt->execute();
                echo "<h2>Ваш комментарий добавлен!</h2>";
                
                // header('Refresh: 2; addInfo.php?id='.$id.'&page='.$page.'');
                
            }
            $id = $_GET['id_field'];
            $page = $_GET['page'];
            if($_GET['page'] == 'Опрос') $parametrs = '<a href="https://andreitsev.ru/information/addInfo.php?id='.$id.'&page='.$page.'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].'">НАЗАД</a>';       
            else if($_GET['page'] == 'ВсяИнформация') $parametrs = '<a href="https://andreitsev.ru/information/addInfo.php?id='.$id.'&page='.$page.'">НАЗАД</a>';
            else if($_GET['page'] == 'Район') $parametrs = '<a href="https://andreitsev.ru/information/addInfo.php?id='.$id.'&page='.$page.'&district='.$_GET['district'].'">НАЗАД</a>';
            else if($_GET['page'] == 'Округ') $parametrs = '<a href="https://andreitsev.ru/information/addInfo.php?id='.$id.'&page='.$page.'&admArea='.$_GET['admArea'].'">НАЗАД</a>';
            echo '<div class="commentLink"><h3>'.$parametrs.'</h3></div>';
            echo '<div class="commentLink"><h3><a href="https://andreitsev.ru/index.php"> Вернуться на главную  </a></h3></div>';
        ?>
        
    </section>
<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php") ?>
