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
            if ($_POST['login'] != null &&  $_POST['password'] != null){
                $stmt = $connect->prepare("SELECT * FROM user WHERE login = ?");
                $stmt->bind_param("s", $_POST["login"]);
                $result = $stmt->execute();
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();
                if(mysqli_num_rows($result) == 0){
                    if ($_GET['type'] == 2) $role = 2;
                    else $role = 3;
                    $pass = md5($_POST["password"]);
                    $stmt = $connect->prepare("INSERT user (login, password_hash, role) VALUES (?, ?, ?)");
                    $stmt->bind_param("ssi", $_POST["login"], $pass, $role);
                    $result = $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                    $stmt->close();
                    if ($_GET['type'] == 2){
                        header('Refresh: 3; http://localhost:3000/user/lk.php');
                        
                        echo '<h2>Вы зарегистрировали нового пользователя.</h2>'; 
                    } 
                    else {
                        header('Refresh: 3; http://localhost:3000/index.php');
                        echo '<h2>Вы зарегистрированы</h2>';
                    }
                }
                else{
                    if ($_GET['type'] == 2){
                        header('Refresh: 3; http://localhost:3000/user/regUser.php');
                        echo '<h2>Невозможно зарегистировать пользователя с таким логином</h2>'; 
                    } 
                    else {
                        header('Refresh: 3; http://localhost:3000/user/regUser.php?type=3');
                        echo '<h2>Невозможно зарегистировать пользователя с таким логином</h2>';
                    }
                }
            }
            else {
                if ($_GET['type'] == 2){
                    header('Refresh: 3; http://localhost:3000/user/regUser.php');
                    echo '<h2>Заполните все поля.</h2>';
                } 
                else {
                    header('Refresh: 3; http://localhost:3000/user/regUser.php?type=3');
                    echo '<h2>Заполните все поля.</h2>';
                }
            }?>
            </div>
    </section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php"); ?>
