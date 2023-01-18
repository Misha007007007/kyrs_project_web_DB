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
                echo "<h3>Не указан идентификатор записи.</h3>";
                header('Refresh: 2; http://localhost:3000/user/lk.php');
            }
            if ($session_user["role"] == 1 || $session_user["role"] == 2){
                $stmt = $connect->prepare("DELETE FROM `addedPlaces` WHERE id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $result = $stmt->execute();
                $stmt->close();
                echo "<h3>Запись удалена</h3>";
                header('Refresh: 2; http://localhost:3000/user/lk.php');
            }
            else{
                echo "<h3>Вы не можете удалить данную запись</h3>";
                header('Refresh: 2; http://localhost:3000/user/lk.php');
            }

        ?>
    </div>
</section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>

