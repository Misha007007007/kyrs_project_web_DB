<?php session_start();
            require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
            require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php");?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <?php
            if(!isset($_GET["id"])){
                header('Refresh: 2; http://localhost:3000/index.php');
                echo '<h2>Не указан идентификатор записи.</h2>';
            }
            if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2){
                $stmt = $connect->prepare("DELETE FROM `addedPlaces` WHERE id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $result = $stmt->execute();
                $stmt->close();
                header('Refresh: 2; http://localhost:3000/user/lk.php');
                echo '<h2>Запись удалена.</h2>';
            }
            else{
                header('Refresh: 2; http://localhost:3000/index.php');
                echo '<h2>Вы не можете удалить данную запись.</h2>';
            }
            ?>
        </div>
    </section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php"); ?>


