<?php require("layoutFiles/header.php") ?> 
            </ul>
        </div>
    </div>
</header>
<section id = "about" class="about">
    <div class="container">
        <?php

            require("connectdb.php");
            $stmt = $connect->prepare("SELECT * FROM `user` WHERE `login`= ? AND `password_hash` = ?");
            $pass = md5($_POST["password"]);
            $stmt->bind_param("ss", $_POST["login"], $pass);

            $result = $stmt->execute();
            $result = mysqli_stmt_get_result($stmt);
            $stmt->close();

            //echo $_POST["login"];
            //echo md5($_POST["password"]);

            if(!$result || mysqli_num_rows($result) == 0){
                echo "<h2>Такой пользователь не существует или введены неверные данные.</h2>";
                header('Refresh: 2; authorization.php');
            }else{
                session_start();
                $_SESSION["user"] = mysqli_fetch_assoc($result);
                header("Location: lk.php");
            }
        ?>
    </div>
</section>
<?php require("layoutFiles/footer.php") ?>
