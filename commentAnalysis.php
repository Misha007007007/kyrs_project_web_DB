<?php require("layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            if(array_key_exists('comment',$_POST) == false){
                echo "<h2>Невозможно добавить комментарий. Вы заполнили не все поля.</h2>";
                header('Refresh: 2; addInfo.php');
            }
            else{
                require("connectdb.php");
                $stmt = $connect->prepare("INSERT INTO `comments` (id_field, `comment`) VALUES (?, ?)");
                $stmt->bind_param("is", $_GET['id_field'], $_POST['comment']);
                $result = $stmt->execute();
                echo "<h2>Ваш комментарий добавлен!</h2>";
                $id = $_GET['id_field'];
                $page = $_GET['page'];
                // header('Refresh: 2; addInfo.php?id='.$id.'&page='.$page.'');
                if($_GET['page'] == 'Опрос') $parametrs = '<a href="addInfo.php?id='.$id.'&page='.$page.'&dictrict='.$_GET['dictrict'].'&incompleteQuery='.$_GET['incompleteQuery'].'">НАЗАД</a>';       
                else if($_GET['page'] == 'ВсяИнформация') $parametrs = '<a href="addInfo.php?id='.$id.'&page='.$page.'">НАЗАД</a>';
                else if($_GET['page'] == 'Район') $parametrs = '<a href="addInfo.php?id='.$id.'&page='.$page.'&district='.$_GET['district'].'">НАЗАД</a>';
                else if($_GET['page'] == 'Округ') $parametrs = '<a href="addInfo.php?id='.$id.'&page='.$page.'&admArea='.$_GET['admArea'].'">НАЗАД</a>';
                
                echo "<h3>$parametrs</h3>";
                echo '<h3><a href="index.php"> Вернуться на главную  </a></h3>';

             }
        ?>
        
    </section>
<?php require("layoutFiles/footer.php") ?>
