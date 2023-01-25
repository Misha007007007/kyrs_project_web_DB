<?php 
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
                header('Refresh: 2; http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
                echo '<<h2>Не указан идентификатор комментария.</h2>';
            }
            if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2){
                $stmt = $connect->prepare("DELETE FROM `comments` WHERE id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $result = $stmt->execute();
                $stmt->close();
                header('Refresh: 2; http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
                echo '<h2>Комментарий удален.</h2>';
            }
            else{
                header('Refresh: 2; http://localhost:3000/information/addInfo.php?id='.$_GET['id_field'].'&page='.$_GET['page'].'');
                echo '<h2>Вы не можете удалить данный комментарий.</h2>';

            }
        ?>
        </div>
    </section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php"); ?>
