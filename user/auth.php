<?php
    session_start();
    require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
    require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php");?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <?php
            $stmt = $connect->prepare("SELECT * FROM `user` WHERE `login`= ? AND `password_hash` = ?");
            $pass = md5($_POST["password"]);
            $stmt->bind_param("ss", $_POST["login"], $pass);
            $result = $stmt->execute();
            $result = mysqli_stmt_get_result($stmt);
            $stmt->close();
            $userData = mysqli_fetch_assoc($result);
            if(!$result || mysqli_num_rows($result) == 0){
                header('Refresh:2; http://localhost:3000/user/authorization.php');
                echo '<h2>Такой пользователь не существует или введены неверные данные..</h2>';
            }else{
                $_SESSION["user"] = mysqli_fetch_assoc($result);
                $session_user = (isset($_SESSION["user"])) ? $_SESSION["user"] : false;
                $_SESSION['login'] = $userData['login'];
                $_SESSION["pass"] = $userData['password_hash'];
                $_SESSION["role"] = $userData['role'];
                header("Location: http://localhost:3000/index.php");
            }
            ?>
    </div>
</section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php"); ?>