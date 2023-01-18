<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?> 
            </ul>
        </div>
    </div>
</header>
<section id = "about" class="about">
    <div class="container">
        <?php
            require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
            require("C:/localhost/front/kyrs_project_web/layoutFiles/session.php");

            if(!isset($_GET["id"])){
                echo "<h3>Не указан идентификатор комментария.</h3>";
                header('Refresh: 2; http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
            }
            if ($session_user["role"] == 1 || $session_user["role"] == 2){
                $stmt = $connect->prepare("DELETE FROM `comments` WHERE id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $result = $stmt->execute();
                $stmt->close();
                echo "<h3>Комментарий удален</h3>";
                header('Refresh: 2; http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
            }
            else{
                echo "<h3>Вы не можете удалить данный комментарий</h3>";
                header('Refresh: 2; http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
            }

        ?>
    </div>
</section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>