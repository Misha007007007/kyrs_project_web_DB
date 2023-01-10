<?php require("layoutFiles/header.php") ?> 
            </ul>
        </div>
    </div>
</header>
<section id = "about" class="about">
    <div class="container">
        <?php
            require("connectdb.php");
            require("session.php");

            if(!isset($_GET["id"])){
                echo "<h3>Не указан идентификатор записи.</h3>";
                header('Refresh: 2; lk.php');
            }
            if ($session_user["role"] == 1 || $session_user["role"] == 2){
                $stmt = $connect->prepare("DELETE FROM `addedPlaces` WHERE id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $result = $stmt->execute();
                $stmt->close();
                echo "<h3>Запись удалена</h3>";
                header('Refresh: 2; lk.php');
            }
            else{
                echo "<h3>Вы не можете удалить данную запись</h3>";
                header('Refresh: 2; lk.php');
            }

        ?>
    </div>
</section>
<?php require("layoutFiles/footer.php") ?>

