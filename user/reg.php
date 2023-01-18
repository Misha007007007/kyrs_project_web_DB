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
            echo $_POST['login'];
            echo $_POST['password'];
            echo $_GET['type'];

            
            if (array_key_exists('login',$_POST) == true && array_key_exists("password",$_POST) == true && array_key_exists('type',$_GET) == true){
                $stmt = $connect->prepare("SELECT * FROM user WHERE login = ?");
                $stmt->bind_param("s", $_POST["login"]);

                $result = $stmt->execute();
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();
                
                //echo mysqli_num_rows($result);
                
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
                        echo "<h2>Вы зарегистрировали нового пользователя</h2>"; 
                        header('Refresh: 3; http://localhost:3000/user/lk.php');
                    } 
                    else {
                        echo "<h2>Вы зарегистрированы</h2>";
                        header('Refresh: 3; http://localhost:3000/index.php');
                    }
                    
                }
                else{
                    if ($_GET['type'] == 2){
                        echo "<h2>Невозможно зарегистировать пользователя с таким логином</h2>"; 
                        header('Refresh: 3; http://localhost:3000/user/regUser.php');
                    } 
                    else {
                        echo "<h2>Невозможно зарегистировать пользователя с таким логином</h2>";
                        header('Refresh: 3; http://localhost:3000/user/regUser.php?type=3');
                    }
                    
                }
                //$id = mysqli_insert_id($connect);
                
            }
            else {
                if ($_GET['type'] == 2){
                    echo "<h2>Заполните все поля.</h2>";
                    header('Refresh: 3; http://localhost:3000/user/regUser.php');
                } 
                else {
                    echo "<h2>Заполните все поля.</h2>";
                    header('Refresh: 3; http://localhost:3000/user/regUser.php?type=3');
                }
                
            }
        ?> 
    </div>
</section>
<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>
